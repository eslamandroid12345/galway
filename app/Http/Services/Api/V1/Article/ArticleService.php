<?php

namespace App\Http\Services\Api\V1\Article;

use App\Http\Resources\V1\Article\ArticleCollection;
use App\Http\Resources\V1\Article\ArticleResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\ArticleRepositoryInterface;

class ArticleService
{
    use Responser;

    public function __construct(
        private readonly GetService                 $getService,
        private readonly ArticleRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(ArticleCollection::class,
            $this->repository, 'getPaginated', [8, 1], true);
    }

    public function show($id)
    {
        return $this->getService->handle(ArticleResource::class,
            $this->repository, 'getById', [$id, ['*'], ['image', 'category']], true);
    }
}
