<?php

namespace App\Http\Controllers\Dashboard\Lecture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Lecture\LectureRequest;
use App\Http\Services\Dashboard\Lecture\LectureService;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function __construct(
        private readonly LectureService $service
    )
    {

    }

    public function create($program_id)
    {
        return $this->service->create($program_id);
    }

    public function store(LectureRequest $request)
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

    public function update(LectureRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
