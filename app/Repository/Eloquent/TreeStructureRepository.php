<?php

namespace App\Repository\Eloquent;

use App\Models\TreeStructure;
use App\Repository\TreeStructureRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TreeStructureRepository extends Repository implements TreeStructureRepositoryInterface
{
    public function __construct(TreeStructure $model)
    {
        parent::__construct($model);
    }

    public function getTreesForAbout($about_id, $paginate = 8)
    {
        return $this->model::query()
            ->where('about_id', $about_id)
            ->latest()
            ->with(['image'])
            ->paginate($paginate);
    }
    public function getTrees($about_id){
        return $this->model::query()
            ->where('about_id', $about_id)
            ->latest()
            ->with(['image'])
            ->get();
    }

}
