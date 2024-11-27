<?php

namespace App\Http\Services\Api\V1\About;

use App\Http\Resources\V1\About\AboutMemebersResource;
use App\Http\Resources\V1\About\AboutNavbarResource;
use App\Http\Resources\V1\About\AboutResource;
use App\Http\Resources\V1\About\AboutSourceResource;
use App\Http\Resources\V1\Image\ImageResource;
use App\Http\Resources\V1\Member\MemberCollection;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\AboutRepositoryInterface;
use App\Repository\Eloquent\MemberRepository;
use App\Repository\TreeStructureRepositoryInterface;
use Illuminate\Support\Facades\Log;

class AboutService
{
    use Responser;

    public function __construct(
        private readonly GetService                       $getService,
        private readonly AboutRepositoryInterface         $repository,
        private readonly MemberRepository         $memberRepository,
        private readonly TreeStructureRepositoryInterface $treeStructureRepository,
    )
    {

    }

    public function index()
    {
        return $this->getService->handle(AboutResource::class, $this->repository, 'getAll', [['*'], ['image'],'sort','ASC']);
    }

    public function getOne($id)
    {
        return $this->getService->handle(AboutSourceResource::class, $this->repository, 'getById', [$id, ['*'], ['image']], true);
    }

    public function show($id)
    {
        try {
            $data = [
                'about' => AboutMemebersResource::make($this->repository->getById($id, ['id', 'title_ar', 'title_en'])),
                'members_paginated' => MemberCollection::make($this->memberRepository->getMembersForAbout($id)),
            ];
            return $this->responseSuccess(data: $data);
        } catch (\Exception $exception) {
            Log::error('CATCH: ' . $exception);
//            return $exception;
            return $this->responseFail(status: 404, message: __('messages.No data found'));
        }
    }

    public function getAdministrative($id)
    {
        try {
            $data = [
                'about' => AboutMemebersResource::make($this->repository->getById($id, ['id', 'title_ar', 'title_en'])),
                'images' => ImageResource::collection($this->treeStructureRepository->getTrees($id)),
            ];
            return $this->responseSuccess(data: $data);
        } catch (\Exception $exception) {
            Log::error('CATCH: ' . $exception);
//            return $e;
            return $this->responseFail(status: 404, message: __('messages.No data found'));
        }
    }
}
