<?php

namespace App\Repository\Eloquent;

use App\Models\CenterNew;
use App\Repository\CenterNewsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CenterNewsRepository extends Repository implements CenterNewsRepositoryInterface
{
    public function __construct(CenterNew $model)
    {
        parent::__construct($model);
    }

    public function getPapers($paginate)
    {
        return $this->model::query()
            ->where('type', 'scientific_papers')
            ->latest()
            ->with(['images'])
            ->paginate($paginate);
    }

    public function getNews($paginate)
    {
        return $this->model::query()
            ->where('type', 'center_news')
            ->latest()
            ->with(['images'])
            ->paginate($paginate);
    }

    public function getNewsForHome()
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en', 'desc_ar', 'desc_en', 'writer_name', 'created_at'])
            ->latest('created_at')
            ->where('type', 'center_news')
            ->with(['image'])
            ->limit(10)
            ->get();
    }

    public function getFirstPaperForHome()
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en', 'desc_ar', 'desc_en', 'writer_name', 'created_at'])
            ->latest('created_at')
            ->where('type', 'scientific_papers')
            ->with(['image'])
            ->first();
    }

    public function getPapersForHome()
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en'])
            ->latest('created_at')
            ->where('type', 'scientific_papers')
            ->with(['image'])
            ->skip(1)
            ->limit(3)
            ->get();
    }

    public function getPaginated($paginate = 8, $type = '')
    {
        return $this->model::query()
            ->select(['id', 'title_ar', 'title_en', 'desc_ar', 'desc_en', 'writer_name', 'created_at'])
            ->latest('created_at')
            ->where('type', $type)
            ->with(['image'])
            ->paginate($paginate);
    }

}
