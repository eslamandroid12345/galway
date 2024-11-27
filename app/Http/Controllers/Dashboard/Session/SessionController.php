<?php

namespace App\Http\Controllers\Dashboard\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Session\SessionRequest;
use App\Http\Services\Dashboard\Session\SessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(
        private readonly SessionService $service
    )
    {

    }

    public function create($program_id)
    {
        return $this->service->create($program_id);
    }

    public function store(SessionRequest $request)
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

    public function update(SessionRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
