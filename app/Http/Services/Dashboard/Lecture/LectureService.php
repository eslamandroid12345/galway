<?php

namespace App\Http\Services\Dashboard\Lecture;

use App\Repository\LectureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LectureService
{
    public function __construct(
        private readonly LectureRepositoryInterface $repository,
    )
    {

    }

    public function create($program_id)
    {
        return view('dashboard.site.lectures.create', compact('program_id'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['type'] = 'lecture';
            $lecture = $this->repository->create($data);
            DB::commit();
            return redirect()->route('lectures.index', $data['program_id'])->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }


    public function show(string $id)
    {
        $lecture = $this->repository->getById($id);
        return view('dashboard.site.lectures.show', compact('lecture'));
    }

    public function edit(string $id)
    {
        $lecture = $this->repository->getById($id);
        return view('dashboard.site.lectures.edit', compact('lecture'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $lecture = $this->repository->getById($id, columns: ['id', 'program_id']);
            $this->repository->update($id, $data);
            DB::commit();
            return redirect()->route('lectures.index', $lecture->program_id)->with(['success' => __('messages.updated_successfully')]);
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
            $lecture = $this->repository->getById($id);
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('lectures.index', $lecture->program_id)->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
