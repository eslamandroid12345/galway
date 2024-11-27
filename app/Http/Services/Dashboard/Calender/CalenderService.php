<?php

namespace App\Http\Services\Dashboard\Calender;

use App\Repository\CalenderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CalenderService
{
    public function __construct(
        private readonly CalenderRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        $calenders = $this->repository->paginate(20, orderBy: 'DESC');
        return view('dashboard.site.calenders.index', compact('calenders'));
    }

    public function create()
    {
        return view('dashboard.site.calenders.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $programme = $this->repository->create($data);
            DB::commit();
            return redirect()->route('calenders.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $calender = $this->repository->getById($id);
        return view('dashboard.site.calenders.show', compact('calender'));
    }

    public function edit(string $id)
    {
        $calender = $this->repository->getById($id);
        return view('dashboard.site.calenders.edit', compact('calender'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->repository->update($id, $data);
            DB::commit();
            return redirect()->route('calenders.index')->with(['success' => __('messages.updated_successfully')]);
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
            return redirect()->route('calenders.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
