<?php

namespace App\Http\Services\Dashboard\Article;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    public function __construct(
        private readonly ArticleRepositoryInterface $repository,
        private readonly CategoryRepositoryInterface $categoryRepository,
        private readonly FileManagerService         $fileManagerService,
    )
    {

    }

    public function index()
    {
        $articles = $this->repository->paginate(20, relations: ['images','category'], orderBy: 'DESC');
        return view('dashboard.site.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories=$this->categoryRepository->getAll();
        return view('dashboard.site.articles.create',compact('categories'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images');
            $article = $this->repository->create($data);
            if ($request->images !== null)
                $this->fileManagerService->uploadMorphImages($request->images, $article, 'articles');
            DB::commit();
            return redirect()->route('articles.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $article = $this->repository->getById($id, relations: ['images']);
        return view('dashboard.site.articles.show', compact('article'));
    }

    public function edit(string $id)
    {
        $categories=$this->categoryRepository->getAll();
        $article = $this->repository->getById($id);
        return view('dashboard.site.articles.edit', compact(['article','categories']));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images');
            $article = $this->repository->getById($id, relations: ['images']);
            $this->repository->update($id, $data);
            if ($request->images !== null) {
                $this->fileManagerService->deleteMorphImages($article);
                $this->fileManagerService->uploadMorphImages($request->images, $article, 'articles');
            }
            DB::commit();
            return redirect()->route('articles.index')->with(['success' => __('messages.updated_successfully')]);
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
            $article = $this->repository->getById($id, relations: ['images']);
            $this->fileManagerService->deleteMorphImages($article);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('articles.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
