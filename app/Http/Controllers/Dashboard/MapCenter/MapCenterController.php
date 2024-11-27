<?php

namespace App\Http\Controllers\Dashboard\MapCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MapCenter\MapCenterRequest;
use App\Http\Services\Dashboard\MapCenter\MapCenterService;
use Illuminate\Http\Request;

class MapCenterController extends Controller
{
    public function __construct(
        private readonly MapCenterService $service
    )
    {

    }

    public function index()
    {
        return $this->service->index();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(MapCenterRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(string $id)
    {
        return $this->service->show($id);
    }

    public function edit(string $id)
    {
        return $this->service->edit($id);
    }

    public function update(MapCenterRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
