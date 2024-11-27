<?php

namespace App\Repository;

interface ArticleRepositoryInterface extends RepositoryInterface
{
    public function getArticlesHome();
    public function getTopicsHome();
    public function getPaginated($paginate, $category_id);

}
