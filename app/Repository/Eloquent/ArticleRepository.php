<?php

namespace App\Repository\Eloquent;

use App\Models\Article;
use App\Repository\ArticleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    public function __construct(Article $model)
    {
        parent::__construct($model);
    }

    public function getPaginated($paginate, $category_id)
    {
        return $this->model::query()
            ->where('category_id', $category_id)
            ->latest('created_at')
            ->with(['image', 'category'])
            ->paginate($paginate);
    }

    public function getArticlesHome()
    {
        return $this->model::query()
            ->where('category_id', 1)
            ->latest('created_at')
            ->with(['image', 'category'])
            ->limit(3)
            ->get();
    }

    public function getTopicsHome()
    {
        return $this->model::query()
            ->where('category_id', 2)
            ->select(['id', 'title_ar', 'title_en'])
            ->latest('created_at')
            ->with('image')
            ->limit(6)
            ->get();
    }
}
