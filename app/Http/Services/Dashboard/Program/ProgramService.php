<?php

namespace App\Http\Services\Dashboard\Program;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\Eloquent\ProgramRepository;
use App\Repository\LectureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProgramService
{
    public function __construct(
        private readonly ProgramRepository $repository,
        private readonly LectureRepositoryInterface $lectureRepository,
        private readonly FileManagerService $fileManagerService,
    )
    {

    }

    public function create($center_programme_id)
    {
        return view('dashboard.site.programs.create', compact('center_programme_id'));
    }
    public function lectures(string $program_id)
    {
        $lectures = $this->lectureRepository->getLecturesByParent($program_id,20);
        return view('dashboard.site.lectures.index', compact('lectures','program_id'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $program=$this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $program, 'program');
            DB::commit();
            return redirect()->route('programs.index',$data['center_programme_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $program = $this->repository->getById($id ,relations: ['image']);
        return view('dashboard.site.programs.show', compact('program'));
    }

    public function edit(string $id)
    {
        $program = $this->repository->getById($id ,relations: ['image']);
        return view('dashboard.site.programs.edit', compact('program'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $program = $this->repository->getById($id);
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($program);
                $this->fileManagerService->uploadMorphOneImage($request->image, $program, 'programs');
            }
            DB::commit();
            return redirect()->route('programs.index',$program->center_programme_id)->with(['success' => __('messages.updated_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $program = $this->repository->getById($id);
            $this->fileManagerService->deleteMorphOneImage($program);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('programs.index',$program->center_programme_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
