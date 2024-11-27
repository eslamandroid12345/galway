<?php

namespace App\Http\Services\Dashboard\ScientificPaper;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\CenterNewsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ScientificPaperService
{
    public function __construct(
        private readonly CenterNewsRepositoryInterface $repository,
        private readonly FileManagerService            $fileManagerService,
    )
    {

    }

    public function index()
    {
        $papers = $this->repository->getPapers(20);
        return view('dashboard.site.scientific-papers.index', compact('papers'));
    }

    public function create()
    {
        return view('dashboard.site.scientific-papers.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('images');
            $paper = $this->repository->create($data);
            if ($request->images !== null)
                $this->fileManagerService->uploadMorphImages($request->images, $paper, 'scientific-papers');
            DB::commit();
            return redirect()->route('scientific-papers.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $paper = $this->repository->getById($id, relations: ['images']);
        return view('dashboard.site.scientific-papers.show', compact('paper'));
    }

    public function edit(string $id)
    {
        $paper = $this->repository->getById($id, relations: ['images']);
        return view('dashboard.site.scientific-papers.edit', compact('paper'));
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
                $this->fileManagerService->uploadMorphImages($request->images, $new, 'scientific-papers');
            }
            DB::commit();
            return redirect()->route('scientific-papers.index')->with(['success' => __('messages.updated_successfully')]);
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
            $paper = $this->repository->getById($id, relations: ['images']);
            $this->fileManagerService->deleteMorphImages($paper);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('scientific-papers.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
