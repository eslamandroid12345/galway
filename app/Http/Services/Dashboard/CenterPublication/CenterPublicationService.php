<?php

namespace App\Http\Services\Dashboard\CenterPublication;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CenterPublicationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CenterPublicationService
{
    public function __construct(
        private readonly CenterPublicationRepositoryInterface $repository,
        private readonly FileManagerService                 $fileManagerService,
    )
    {

    }

    public function index()
    {
        $publications = $this->repository->paginate(20, relations: ['image'], orderBy: 'DESC');
        return view('dashboard.site.center-publications.index', compact('publications'));
    }

    public function create()
    {
        return view('dashboard.site.center-publications.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            if ($request->view_link !== null)
                $data['view_link'] = $this->fileManagerService->upload('view_link', 'pdfs');
            $publication = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $publication, 'center-publications');
            DB::commit();
            return redirect()->route('center-publications.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $publication = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.center-publications.show', compact('publication'));
    }

    public function edit(string $id)
    {
        $publication = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.center-publications.edit', compact('publication'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            if ($request->view_link !== null)
                $data['view_link'] = $this->fileManagerService->upload('view_link', 'pdfs');
            $this->repository->update($id,$data);
            $publication = $this->repository->getById($id, relations: ['image']);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($publication);
                $this->fileManagerService->uploadMorphOneImage($request->image, $publication, 'center-publications');
            }
            DB::commit();
            return redirect()->route('center-publications.index')->with(['success' => __('messages.updated_successfully')]);
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
            $publication = $this->repository->getById($id, relations: ['image']);
            $this->fileManagerService->deleteMorphOneImage($publication);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('center-publications.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
