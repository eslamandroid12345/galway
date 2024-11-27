<?php

namespace App\Http\Controllers\Dashboard\ScientificPaper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ScientificPaper\ScientificPaperRequest;
use App\Http\Services\Dashboard\ScientificPaper\ScientificPaperService;
use Illuminate\Http\Request;

class ScientificPaperController extends Controller
{
    public function __construct(
        private readonly ScientificPaperService $service
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

    public function store(ScientificPaperRequest $request)
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

    public function update(ScientificPaperRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
