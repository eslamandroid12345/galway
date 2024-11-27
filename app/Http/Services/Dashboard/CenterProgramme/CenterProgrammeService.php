<?php

namespace App\Http\Services\Dashboard\CenterProgramme;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Support\Facades\DB;
use function App\store_model;

class CenterProgrammeService
{
    public function __construct(
        private readonly CenterProgrammeRepositoryInterface $repository,
        private readonly ProgramRepositoryInterface $programRepository,
        private readonly FileManagerService                 $fileManagerService,
    )
    {

    }

    public function index()
    {
        $programmes = $this->repository->paginate(20, relations: ['image'], orderBy: 'DESC');
        return view('dashboard.site.center-programmes.index', compact('programmes'));
    }
    public function programs($center_programme_id){
        $programs=$this->programRepository->getProgramsByParent($center_programme_id,20);
        return view('dashboard.site.programs.index', compact('programs','center_programme_id'));
    }
    public function symposiums($center_programme_id){
        $symposiums=$this->programRepository->getProgramsByParent($center_programme_id,20);
        return view('dashboard.site.symposiums.index', compact('symposiums','center_programme_id'));
    }
    public function create()
    {
        return view('dashboard.site.center-programmes.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $programme = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $programme, 'center-programmes');
            DB::commit();
            return redirect()->route('center-programmes.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $programme = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.center-programmes.show', compact('programme'));
    }

    public function edit(string $id)
    {
        $programme = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.center-programmes.edit', compact('programme'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $programme = $this->repository->getById($id, relations: ['image']);
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($programme);
                $this->fileManagerService->uploadMorphOneImage($request->image, $programme, 'center-programmes');
            }
            DB::commit();
            return redirect()->route('center-programmes.index')->with(['success' => __('messages.updated_successfully')]);
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
            $programme = $this->repository->getById($id, relations: ['image']);
            $this->fileManagerService->deleteMorphOneImage($programme);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('center-programmes.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
