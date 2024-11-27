<?php

namespace App\Repository\Eloquent;

use App\Models\CenterPublication;
use App\Repository\CenterPublicationRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CenterPublicationRepository extends Repository implements CenterPublicationRepositoryInterface
{
    public function __construct(CenterPublication $model)
    {
        parent::__construct($model);
    }

    public function getForHome()
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en', 'desc_ar', 'desc_en'])
            ->latest('created_at')
            ->with('image')
            ->limit(20)
            ->get();
    }
}
