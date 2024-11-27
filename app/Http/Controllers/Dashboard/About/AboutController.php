<?php

namespace App\Http\Controllers\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\About\AboutRequest;
use App\Http\Services\Dashboard\About\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(
        private readonly AboutService $service
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

    public function store(AboutRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(string $id)
    {
        return $this->service->show($id);
    }
    public function members(string $id)
    {
        return $this->service->members($id);
    }
    public function trees(string $id)
    {
        return $this->service->trees($id);
    }

    public function edit(string $id)
    {
        return $this->service->edit($id);
    }

    public function update(AboutRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
