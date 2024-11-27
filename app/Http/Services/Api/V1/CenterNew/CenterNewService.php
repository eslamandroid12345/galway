<?php

namespace App\Http\Services\Api\V1\CenterNew;

use App\Http\Resources\V1\CenterNews\CenterNewCollection;
use App\Http\Resources\V1\CenterNews\CenterNewsGeneralResource;
use App\Http\Resources\V1\CenterNews\CenterNewsResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\CenterNewsRepositoryInterface;

class CenterNewService
{
    use Responser;

    public function __construct(
        private readonly GetService                    $getService,
        private readonly CenterNewsRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(CenterNewCollection::class,
            $this->repository, 'getPaginated', [8, 'center_news'], true);

    }

    public function show($id)
    {
        return $this->getService->handle(CenterNewsResource::class,
            $this->repository, 'getById', [$id, ['*'], ['image']], true);
    }
}
