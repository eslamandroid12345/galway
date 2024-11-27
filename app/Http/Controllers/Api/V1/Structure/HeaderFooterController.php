<?php

namespace App\Http\Controllers\Api\V1\Structure;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\About\AboutNavbarResource;
use App\Http\Resources\V1\CenterProgram\CenterProgramNavbarResource;
use App\Http\Services\Api\V1\Structure\StructureService;
use App\Http\Traits\Responser;
use App\Repository\AboutRepositoryInterface;
use App\Repository\CenterProgrammeRepositoryInterface;
use Illuminate\Http\Request;

class HeaderFooterController extends StructureController
{
    use Responser;

    public function __construct(StructureService                                    $structureService,
                                private readonly AboutRepositoryInterface           $aboutRepository,
                                private readonly CenterProgrammeRepositoryInterface $centerProgrammeRepository,
    )
    {
        parent::__construct($structureService);
    }

    protected string $contentKey = 'header_footer';

    public function __invoke()
    {
        $data = [
            'header_footer' => $this->structure->get($this->contentKey, $this->resource, data_needed: true),
            'abouts_nav' => AboutNavbarResource::collection($this->aboutRepository->getNavbarItems()),
            'programs_nav' => CenterProgramNavbarResource::collection($this->centerProgrammeRepository->getNavbarItems()),
        ];
        return $this->responseSuccess(data: $data);
    }
}
