<?php

namespace App\Http\Services\Dashboard\MapCenter;

use App\Http\Services\Mutual\FileManagerService;
use App\Repository\MapCenterRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MapCenterService
{
    public function __construct(
        private readonly MapCenterRepositoryInterface $repository,
        private readonly FileManagerService                 $fileManagerService,
    )
    {

    }

    public function index()
    {
        $maps = $this->repository->paginate(20, orderBy: 'DESC');
        return view('dashboard.site.map-centers.index', compact('maps'));
    }

    public function create()
    {
        return view('dashboard.site.map-centers.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->repository->create($data);
            DB::commit();
            return redirect()->route('map-centers.index')->with(['success' => __('messages.created_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }

    public function show(string $id)
    {
        $map = $this->repository->getById($id);
        return view('dashboard.site.map-centers.show', compact('map'));
    }

    public function edit(string $id)
    {
        $map = $this->repository->getById($id);
        return view('dashboard.site.map-centers.edit', compact('map'));
    }

    public function update($request, string $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->repository->update($id, $data);
            DB::commit();
            return redirect()->route('map-centers.index')->with(['success' => __('messages.updated_successfully')]);
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
            return redirect()->route('map-centers.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
