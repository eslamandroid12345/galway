<?php

namespace App\Http\Controllers\Dashboard\Calender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Calender\CalenderRequest;
use App\Http\Services\Dashboard\Calender\CalenderService;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function __construct(
        private readonly CalenderService $service
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

    public function store(CalenderRequest $request)
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

    public function update(CalenderRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
