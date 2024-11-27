<?php

namespace App\Http\Controllers\Dashboard\Program;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Program\ProgramRequest;
use App\Http\Services\Dashboard\Program\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct(
        private readonly ProgramService $service
    )
    {

    }

    public function create($center_programme_id)
    {
        return $this->service->create($center_programme_id);
    }

    public function store(ProgramRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(string $id)
    {
        return $this->service->show($id);
    }
    public function lectures(string $id)
    {
        return $this->service->lectures($id);
    }

    public function edit(string $id)
    {
        return $this->service->edit($id);
    }

    public function update(ProgramRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
