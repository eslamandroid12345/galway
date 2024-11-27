<?php

namespace App\Http\Services\Api\V1\CenterPublication;

use App\Http\Resources\V1\CenterPublication\CenterPublicationCollection;
use App\Http\Resources\V1\CenterPublication\CenterPublicationSourceResource;
use App\Http\Services\Mutual\GetService;
use App\Repository\CenterPublicationRepositoryInterface;

class CenterPublicationService
{
    public function __construct(
        private readonly GetService                           $getService,
        private readonly CenterPublicationRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(CenterPublicationCollection::class,
            $this->repository, 'paginate', [9, ['image'],'DESC'], true);
    }

    public function show($id)
    {
        return $this->getService->handle(CenterPublicationSourceResource::class,
            $this->repository, 'getById', [$id, ['*'], ['image']], true);
    }
}
