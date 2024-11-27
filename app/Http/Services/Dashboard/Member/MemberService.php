<?php

namespace App\Http\Services\Dashboard\Member;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\MemberRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MemberService
{
    public function __construct(
        private readonly MemberRepositoryInterface $repository,
        private readonly FileManagerService       $fileManagerService,
    )
    {

    }

    public function create($about_id)
    {
        return view('dashboard.site.members.create',compact('about_id'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $member = $this->repository->create($data);
            if ($request->image !== null)
                $this->fileManagerService->uploadMorphOneImage($request->image, $member, 'members');
            DB::commit();
            return redirect()->route('members.index',$data['about_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $member = $this->repository->getById($id, relations: ['image','about']);
        return view('dashboard.site.members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = $this->repository->getById($id, relations: ['image']);
        return view('dashboard.site.members.edit', compact('member'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('image');
            $member = $this->repository->getById($id, relations: ['image']);
            $this->repository->update($id, $data);
            if ($request->image !== null) {
                $this->fileManagerService->deleteMorphOneImage($member);
                $this->fileManagerService->uploadMorphOneImage($request->image, $member, 'members');
            }
            DB::commit();
            return redirect()->route('members.index',$member->about_id)->with(['success' => __('messages.updated_successfully')]);
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
            $member = $this->repository->getById($id, relations: ['image']);
            $this->fileManagerService->deleteMorphOneImage($member);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('members.index',$member->about_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
}
}
