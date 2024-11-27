<?php

namespace App\Http\Services\Dashboard\About;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\AboutRepositoryInterface;
use App\Repository\MemberRepositoryInterface;
use App\Repository\TreeStructureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AboutService
{
    public function __construct(
        private readonly AboutRepositoryInterface $repository,
        private readonly MemberRepositoryInterface $memberRepository,
        private readonly TreeStructureRepositoryInterface $treeStructureRepository,
        private readonly FileManagerService       $fileManagerService,
    )
    {

    }

    public function index()
    {
        $abouts = $this->repository->paginate(20, relations: ['image'], orderBy: 'DESC');
        return view('dashboard.site.abouts.index', compact('abouts'));
    }
    public function members(string $about_id)
    {
        $members=$this->memberRepository->getMembersForAbout($about_id);
        return view('dashboard.site.members.index', compact('members','about_id'));
    }
    public function trees(string $about_id)
    {
        $trees=$this->treeStructureRepository->getTreesForAbout($about_id);
        return view('dashboard.site.tree-structures.index', compact('trees','about_id'));
    }
    public function create()
    {
        return view('dashboard.site.abouts.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $data['has_members'] =  isset($data['has_members']) && $data['has_members'] == 'on' ? 1 : 0;
            $data['structure_tree'] =  isset($data['structure_tree']) && $data['structure_tree'] == 'on' ? 1 : 0;
            $about = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $about, 'abouts');
            DB::commit();
            return redirect()->route('abouts.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $about = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.abouts.show', compact('about'));
    }

    public function edit(string $id)
    {
        $about = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.abouts.edit', compact('about'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $about = $this->repository->getById($id, relations: ['image']);
            $data['has_members'] =  isset($data['has_members']) && $data['has_members'] == 'on' ? 1 : 0;
            $data['structure_tree'] =  isset($data['structure_tree']) && $data['structure_tree'] == 'on' ? 1 : 0;
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($about);
                $this->fileManagerService->uploadMorphOneImage($request->image, $about, 'abouts');
            }
            DB::commit();
            return redirect()->route('abouts.index')->with(['success' => __('messages.updated_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $about = $this->repository->getById($id, relations: ['image']);
            $this->fileManagerService->deleteMorphOneImage($about);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('abouts.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
