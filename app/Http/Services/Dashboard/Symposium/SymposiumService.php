<?php

namespace App\Http\Services\Dashboard\Symposium;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\Eloquent\ProgramRepository;
use App\Repository\LectureRepositoryInterface;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SymposiumService
{
    public function __construct(
        private readonly ProgramRepository          $repository,
        private readonly LectureRepositoryInterface $lectureRepository,
        private readonly FileManagerService         $fileManagerService,

    )
    {

    }

    public function create($center_programme_id)
    {
        return view('dashboard.site.symposiums.create', compact('center_programme_id'));
    }

    public function sessions(string $program_id)
    {
        $sessions = $this->lectureRepository->getLecturesByParent($program_id, 20);
        return view('dashboard.site.sessions.index', compact('sessions', 'program_id'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            if ($request->view_link !== null)
                $data['view_link'] = $this->fileManagerService->upload('view_link', 'pdfs');
            $symposium = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $symposium, 'symposiums');
            DB::commit();
            return redirect()->route('symposiums.index', $data['center_programme_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $symposium = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.symposiums.show', compact('symposium'));
    }

    public function edit(string $id)
    {
        $symposium = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.symposiums.edit', compact('symposium'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $symposium = $this->repository->getById($id);
            if ($request->view_link !== null)
                $data['view_link'] = $this->fileManagerService->upload('view_link', 'pdfs');
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($symposium);
                $this->fileManagerService->uploadMorphOneImage($request->image, $symposium, 'symposiums');
            }
            DB::commit();
            return redirect()->route('symposiums.index', $symposium->center_programme_id)->with(['success' => __('messages.updated_successfully')]);
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
            $symposium = $this->repository->getById($id);
            $this->fileManagerService->deleteMorphOneImage($symposium);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('symposiums.index', $symposium->center_programme_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
