<?php

namespace App\Http\Controllers\Dashboard\Symposium;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Symposium\SymposiumRequest;
use App\Http\Services\Dashboard\Symposium\SymposiumService;
use Illuminate\Http\Request;

class SymposiumController extends Controller
{
    public function __construct(
        private readonly SymposiumService $service
    )
    {

    }

    public function create($center_programme_id)
    {
        return $this->service->create($center_programme_id);
    }

    public function store(SymposiumRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(string $id)
    {
        return $this->service->show($id);
    }
    public function sessions(string $id)
    {
        return $this->service->sessions($id);
    }

    public function edit(string $id)
    {
        return $this->service->edit($id);
    }

    public function update(SymposiumRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
