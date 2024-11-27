<?php

namespace App\Http\Services\Api\V1\Topic;

use App\Http\Resources\V1\Topic\TopicCollection;
use App\Http\Resources\V1\Topic\TopicResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\ArticleRepositoryInterface;

class TopicService
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
        return $this->getService->handle(TopicCollection::class,
            $this->repository, 'getPaginated', [8, 2], true);
    }

    public function show($id)
    {
        return $this->getService->handle(TopicResource::class,
            $this->repository,'getById', [$id, ['*'], ['image', 'category']], true);
    }
}
