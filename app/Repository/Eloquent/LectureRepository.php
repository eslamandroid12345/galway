<?php

namespace App\Repository\Eloquent;

use App\Models\Lecture;
use App\Repository\LectureRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class LectureRepository extends Repository implements LectureRepositoryInterface
{
    public function __construct(Lecture $model)
    {
        parent::__construct($model);
    }

    public function getLecturesByParent($program_id, $paginate)
    {
        return $this->model::query()
            ->where('program_id', $program_id)
            ->orderByDesc('created_at')
            ->paginate($paginate);
    }

    public function countPapers()
    {
        return $this->model::query()
            ->where('type', 'scientific_paper')
            ->whereNotNull('url')
            ->count();
    }

}
