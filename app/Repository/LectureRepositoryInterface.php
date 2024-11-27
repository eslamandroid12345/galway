<?php

namespace App\Repository;

interface LectureRepositoryInterface extends RepositoryInterface
{
    public function getLecturesByParent($program_id, $paginate);

    public function countPapers();

}
