<?php

namespace App\Http\Controllers\Dashboard\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Article\ArticleRequest;
use App\Http\Services\Dashboard\Article\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        private readonly ArticleService $service
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

    public function store(ArticleRequest $request)
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

    public function update(ArticleRequest $request, string $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->service->destroy($id);
    }
}
