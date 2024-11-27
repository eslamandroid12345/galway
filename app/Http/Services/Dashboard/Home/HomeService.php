<?php

namespace App\Http\Services\Dashboard\Home;

use App\Repository\CenterNewsRepositoryInterface;
use App\Repository\CenterProgrammeRepositoryInterface;
use App\Repository\CenterPublicationRepositoryInterface;
use App\Repository\ContactRepositoryInterface;
use App\Repository\LectureRepositoryInterface;
use App\Repository\ManagerRepositoryInterface;
use App\Repository\ProgramRepositoryInterface;
use App\Repository\VisitorRepositoryInterface;

class HomeService
{
    public function __construct(
        private readonly CenterProgrammeRepositoryInterface $centerProgrammeRepository ,
        private readonly CenterPublicationRepositoryInterface $centerPublicationRepository ,
        private readonly CenterNewsRepositoryInterface $centerNewsRepository ,
        private readonly ProgramRepositoryInterface $programRepository ,
        private readonly LectureRepositoryInterface $lectureRepository ,
        private readonly ContactRepositoryInterface $contactRepository ,
        private readonly ManagerRepositoryInterface $managerRepository ,
        private readonly VisitorRepositoryInterface $visitorRepository ,
    )
    {

    }

    public function index()
    {
        $data=[
            'center-programmes' => $this->centerProgrammeRepository->count() ,
            'center-publications' => $this->centerPublicationRepository->count() ,
            'center-news' => $this->centerNewsRepository->count() ,
            'programs' => $this->programRepository->count() ,
            'lectures' => $this->lectureRepository->count() ,
            'contacts' => $this->contactRepository->count() ,
            'managers' => $this->managerRepository->count() ,
            'visitors' => $this->visitorRepository->count() ,
        ];
        return view('dashboard.site.home.index',compact('data'));
    }
}
