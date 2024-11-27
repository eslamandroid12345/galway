<?php

namespace App\Http\Services\Api\V1\Home;

use App\Http\Resources\V1\About\AboutMoreGeneralResource;
use App\Http\Resources\V1\About\AboutGeneralResource;
use App\Http\Resources\V1\Article\ArticleGeneralResource;
use App\Http\Resources\V1\CenterNews\CenterNewsGeneralResource;
use App\Http\Resources\V1\CenterProgram\CenterProgramGeneralResource;
use App\Http\Resources\V1\CenterPublication\CenterPublicationGeneralResource;
use App\Http\Resources\V1\MapCenter\MapCenterResource;
use App\Http\Resources\V1\Paper\PaperGeneralResource;
use App\Http\Resources\V1\Paper\PaperResource;
use App\Http\Resources\V1\Topic\TopicGeneralResource;
use App\Http\Services\Api\V1\Structure\StructureService;
use App\Http\Traits\Responser;
use App\Repository\AboutRepositoryInterface;
use App\Repository\ArticleRepositoryInterface;
use App\Repository\CenterNewsRepositoryInterface;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\CenterPublicationRepositoryInterface;
use App\Repository\Eloquent\ProgramRepository;
use App\Repository\LectureRepositoryInterface;
use App\Repository\MapCenterRepositoryInterface;
use App\Repository\StructureRepositoryInterface;
use App\Repository\VisitorRepositoryInterface;

class HomeService
{
    use Responser;

    public function __construct(
        private readonly StructureService                     $structureService,
        private readonly AboutRepositoryInterface             $aboutRepository,
        private readonly CenterPublicationRepositoryInterface $publicationRepository,
        private readonly CenterProgrammeRepositoryInterface   $programmeRepository,
        private readonly CenterNewsRepositoryInterface        $newsRepository,
        private readonly ArticleRepositoryInterface           $articleRepository,
        private readonly VisitorRepositoryInterface           $visitorRepository,
        private readonly ProgramRepository                    $programRepository,
        private readonly MapCenterRepositoryInterface         $mapCenterRepository,
        private readonly LectureRepositoryInterface           $lectureRepository,
    )
    {

    }

    public function invoke()
    {
        $abouts = $this->aboutRepository->getForHome();
        $data = [
            'content' => $this->structureService->get('home', data_needed: true) ?? null,
            'first_about' => AboutMoreGeneralResource::make($abouts->first()),
            'second_about' => AboutGeneralResource::make($abouts->skip(1)->first()),
            'center_publications' => CenterPublicationGeneralResource::collection($this->publicationRepository->getForHome()),
            'center_programmes' => CenterProgramGeneralResource::collection($this->programmeRepository->getForHome()),
            'center_news' => CenterNewsGeneralResource::collection($this->newsRepository->getNewsForHome()),
            'articles' => ArticleGeneralResource::collection($this->articleRepository->getArticlesHome()),
            'first_paper' => PaperResource::make($this->newsRepository->getFirstPaperForHome()),
            'papers' => PaperGeneralResource::collection($this->newsRepository->getPapersForHome()),
            'statics' => [
                'visitors' => $this->visitorRepository->count(),
                'publications' => $this->publicationRepository->count(),
                'programs' => $this->programRepository->count(),
                'beneficiaries' => $this->lectureRepository->countPapers() + $this->publicationRepository->count() ,
            ],
            'topics' => TopicGeneralResource::collection($this->articleRepository->getTopicsHome()),
            'map_centers' => MapCenterResource::collection($this->mapCenterRepository->getAll(orderByColumn: 'id',orderByValue: 'DESC')),
        ];
        return $this->responseSuccess(data: $data);
    }
}
