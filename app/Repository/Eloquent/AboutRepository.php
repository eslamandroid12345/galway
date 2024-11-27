<?php

namespace App\Repository\Eloquent;

use App\Models\About;
use App\Repository\AboutRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AboutRepository extends Repository implements AboutRepositoryInterface
{
    public function __construct(About $model)
    {
        parent::__construct($model);
    }

    public function getForHome()
    {
        return $this->model::query()
            ->orderBy('sort')
            ->limit(2)
            ->with('image')
            ->get();
    }

    public function getNavbarItems()
    {
        return $this->model::query()
            ->select('id', 'title_ar', 'title_en', 'has_members', 'structure_tree')
            ->orderBy('sort')
            ->get();
    }

}
