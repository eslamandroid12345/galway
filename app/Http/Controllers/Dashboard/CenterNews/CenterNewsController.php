<?php

namespace App\Http\Controllers\Dashboard\CenterNews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CenterNews\CenterNewsRequest;
use App\Http\Services\Dashboard\CenterNews\CenterNewService;
use Illuminate\Http\Request;

class CenterNewsController extends Controller
{
    public function __construct(
        private readonly CenterNewService $service
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

    public function store(CenterNewsRequest $request)
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

    public function update(CenterNewsRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
