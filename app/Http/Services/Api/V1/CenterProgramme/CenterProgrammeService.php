<?php

namespace App\Http\Services\Api\V1\CenterProgramme;

use App\Http\Resources\V1\CenterProgram\CenterProgramGeneralResource;
use App\Http\Resources\V1\CenterProgram\CenterProgramNavbarResource;
use App\Http\Resources\V1\CenterProgram\CenterProgramResource;
use App\Http\Resources\V1\Programme\ProgramCollection;
use App\Http\Resources\V1\Programme\ProgramGeneralResource;
use App\Http\Resources\V1\Programme\ProgramResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CenterProgrammeService
{
    use Responser;

    public function __construct(
        private readonly GetService                         $getService,
        private readonly CenterProgrammeRepositoryInterface $repository,
        private readonly ProgramRepositoryInterface         $programRepository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(CenterProgramGeneralResource::class, $this->repository, 'getAll', [['*'], ['image']]);
    }

    public function navItems()
    {
        return $this->getService->handle(CenterProgramNavbarResource::class, $this->repository, 'getNavbarItems');
    }

    public function show($id)
    {
        try {
            $data = [
                'program' => CenterProgramResource::make($this->repository->getById($id, ['id', 'title_ar', 'title_en'])),
                'programs_paginated' => ProgramCollection::make($this->programRepository->getProgramsByParent($id, 4)),
            ];
            return $this->responseSuccess(data: $data);
        } catch (\Exception $exception) {
            Log::error('CATCH: ' . $exception);
//            return $e;
            return $this->responseFail(status: 404, message: __('messages.No data found'));
        }
    }

    public function showSymposium($id)
    {
        return $this->getService->handle(ProgramResource::class, $this->programRepository,
            'getById', [$id, ['*'], ['children.children']], true);
    }
}
