<?php

namespace App\Http\Services\Dashboard\Session;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\Eloquent\ProgramRepository;
use App\Repository\LectureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SessionService
{
    public function __construct(
        private readonly LectureRepositoryInterface $repository,
        private readonly FileManagerService         $fileManagerService,
    )
    {

    }

    public function create($program_id)
    {
        return view('dashboard.site.sessions.create', compact('program_id'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('papers');
            $data['type'] = 'session';
            $session = $this->repository->create($data);
            if ($request->papers !== null)
                $this->attachPapers($session, $request->papers);
            DB::commit();
            return redirect()->route('sessions.index', $data['program_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    private function attachPapers($session, $papers)
    {
        foreach ($papers as $paper) {
            $paper['type'] = 'scientific_paper';
            if (!empty($paper['url']) && is_file($paper['url']))
                $paper['url'] = $this->fileManagerService->uploadFile(file: $paper['url'], folder: 'pdfs');
            if (!empty($paper['existing_url']) && empty($paper['url']))
                $paper['url'] = $paper['existing_url'];

            unset($paper['existing_url']);
            $session->children()?->create($paper);
        }
    }

    public function show(string $id)
    {
        $session = $this->repository->getById($id, relations: ['children']);
        return view('dashboard.site.sessions.show', compact('session'));
    }

    public function edit(string $id)
    {
        $session = $this->repository->getById($id, relations: ['children']);
        return view('dashboard.site.sessions.edit', compact('session'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('papers');
            $session = $this->repository->getById($id, columns: ['id', 'program_id'], relations: ['children']);
            $this->repository->update($id, $data);
            $session->children()?->delete();
            if ($request->papers !== null) {
                $this->attachPapers($session, $request->papers);
            }
            DB::commit();
            return redirect()->route('sessions.index', $session->program_id)->with(['success' => __('messages.updated_successfully')]);
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
            $session = $this->repository->getById($id);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('sessions.index', $session->program_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
