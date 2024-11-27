<?php

namespace App\Repository\Eloquent;

use App\Models\CenterProgramme;
use App\Repository\CenterProgrammeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CenterProgrammeRepository extends Repository implements CenterProgrammeRepositoryInterface
{
    public function __construct(CenterProgramme $model)
    {
        parent::__construct($model);
    }

    public function getForHome()
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en', 'desc_ar', 'desc_en'])
            ->orderBy('sort')
            ->with('image')
            ->limit(10)
            ->get();
    }

    public function getNavbarItems()
    {
        return $this->model::query()
            ->select('id', 'title_ar', 'title_en')
            ->orderBy('sort')
            ->get();
    }
}
