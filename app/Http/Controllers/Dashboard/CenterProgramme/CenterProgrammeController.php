<?php

namespace App\Http\Controllers\Dashboard\CenterProgramme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CenterProgramme\CenterProgrammeRequest;
use App\Http\Services\Dashboard\CenterProgramme\CenterProgrammeService;
use App\Http\Services\Dashboard\CenterPublication\CenterPublicationService;
use Illuminate\Http\Request;

class CenterProgrammeController extends Controller
{
    public function __construct(
        private readonly CenterProgrammeService $service
    )
    {

    }

    public function index()
    {
        return $this->service->index();
    }

    public function programs($center_programme_id){
        return $this->service->programs($center_programme_id);
    }
    public function symposiums($center_programme_id){
        return $this->service->symposiums($center_programme_id);
    }
    public function create()
    {
        return $this->service->create();
    }

    public function store(CenterProgrammeRequest $request)
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

    public function update(CenterProgrammeRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
