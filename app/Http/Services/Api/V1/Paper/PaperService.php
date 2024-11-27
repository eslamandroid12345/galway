<?php

namespace App\Http\Services\Api\V1\Paper;

use App\Http\Resources\V1\Article\ArticleCollection;
use App\Http\Resources\V1\Article\ArticleResource;
use App\Http\Resources\V1\Paper\PaperCollection;
use App\Http\Resources\V1\Paper\PaperSourceResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\CenterNewsRepositoryInterface;

class PaperService
{

    public function __construct(
        private readonly GetService                    $getService,
        private readonly CenterNewsRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(PaperCollection::class,
            $this->repository, 'getPaginated', [8, 'scientific_papers'], true);
    }

    public function show($id)
    {
        return $this->getService->handle(PaperSourceResource::class,
            $this->repository, 'getById', [$id, ['*'], ['image']], true);
    }
}
