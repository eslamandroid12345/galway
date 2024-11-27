<?php

namespace App\Http\Controllers\Dashboard\CenterPublication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CenterProgramme\CenterProgrammeRequest;
use App\Http\Requests\Dashboard\CenterPublication\CenterPublicationRequest;
use App\Http\Services\Dashboard\CenterProgramme\CenterProgrammeService;
use App\Http\Services\Dashboard\CenterPublication\CenterPublicationService;
use Illuminate\Http\Request;

class CenterPublicationController extends Controller
{
    public function __construct(
        private readonly CenterPublicationService $service
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

    public function store(CenterPublicationRequest  $request)
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

    public function update(CenterPublicationRequest  $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
