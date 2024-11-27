<?php

namespace App\Http\Services\Api\V1\Calender;

use App\Http\Resources\V1\Calender\CalenderResource;
use App\Http\Services\Mutual\GetService;
use App\Repository\CalenderRepositoryInterface;

class CalenderService
{
    public function __construct(
        private readonly GetService                  $getService,
        private readonly CalenderRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(CalenderResource::class, $this->repository, 'getDates');
    }
}
