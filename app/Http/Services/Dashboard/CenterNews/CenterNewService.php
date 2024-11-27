<?php

namespace App\Http\Services\Dashboard\CenterNews;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CenterNewsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CenterNewService
{
    public function __construct(
        private readonly CenterNewsRepositoryInterface $repository,
        private readonly FileManagerService                 $fileManagerService,
    )
    {

    }

    public function index()
    {
        $news = $this->repository->getNews(20);
        return view('dashboard.site.center-news.index', compact('news'));
    }

    public function create()
    {
        return view('dashboard.site.center-news.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images');
            $new = $this->repository->create($data);
            if ($request->images !== null)
                $this->fileManagerService->uploadMorphImages($request->images, $new, 'center-news');
            DB::commit();
            return redirect()->route('center-news.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $new = $this->repository->getById($id, relations: ['images']);
        return view('dashboard.site.center-news.show', compact('new'));
    }

    public function edit(string $id)
    {
        $new = $this->repository->getById($id, relations: ['images']);
        return view('dashboard.site.center-news.edit', compact('new'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images');
            $new = $this->repository->getById($id, relations: ['images']);
            $this->repository->update($id, $data);
            if ($request->images !== null) {
                $this->fileManagerService->deleteMorphImages($new);
                $this->fileManagerService->uploadMorphImages($request->images, $new, 'center-news');
            }
            DB::commit();
            return redirect()->route('center-news.index')->with(['success' => __('messages.updated_successfully')]);
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
            $new = $this->repository->getById($id, relations: ['images']);
            $this->fileManagerService->deleteMorphImages($new);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('center-news.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
