<?php

namespace App\Http\Services\Dashboard\Category;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\CenterProgrammeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        $categories = $this->repository->paginate(20, orderBy: 'DESC');
        return view('dashboard.site.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.site.categories.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $programme = $this->repository->create($data);
            DB::commit();
            return redirect()->route('categories.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $category = $this->repository->getById($id);
        return view('dashboard.site.categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = $this->repository->getById($id);
        return view('dashboard.site.categories.edit', compact('category'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->repository->update($id, $data);
            DB::commit();
            return redirect()->route('categories.index')->with(['success' => __('messages.updated_successfully')]);
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
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('categories.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
