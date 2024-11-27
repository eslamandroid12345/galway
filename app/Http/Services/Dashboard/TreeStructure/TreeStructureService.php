<?php

namespace App\Http\Services\Dashboard\TreeStructure;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\TreeStructureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TreeStructureService
{
    public function __construct(
        private readonly TreeStructureRepositoryInterface $repository,
        private readonly FileManagerService       $fileManagerService,
    )
    {

    }

    public function create($about_id)
    {
        return view('dashboard.site.tree-structures.create',compact('about_id'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $tree = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $tree, 'tree-structures');
            DB::commit();
            return redirect()->route('trees.index',$data['about_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }


    public function edit(string $id)
    {
        $tree = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.tree-structures.edit', compact('tree'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $tree = $this->repository->getById($id, relations: ['image']);
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($tree);
                $this->fileManagerService->uploadMorphOneImage($request->image, $tree, 'tree-structures');
            }
            DB::commit();
            return redirect()->route('trees.index',$tree->about_id)->with(['success' => __('messages.updated_successfully')]);
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
            $tree = $this->repository->getById($id, relations: ['image']);
            $this->fileManagerService->deleteMorphOneImage($tree);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('trees.index',$tree->about_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
