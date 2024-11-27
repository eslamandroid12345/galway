<?php

namespace App\Http\Controllers\Dashboard\TreeStructure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TreeStructure\TreeStructureRequest;
use App\Http\Services\Dashboard\TreeStructure\TreeStructureService;
use Illuminate\Http\Request;

class TreeStructureController extends Controller
{
    public function __construct(
        private readonly TreeStructureService $service
    )
    {

    }
    public function create($id)
    {
        return $this->service->create($id);
    }

    public function store(TreeStructureRequest $request)
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

    public function update(TreeStructureRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
