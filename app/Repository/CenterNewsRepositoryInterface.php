<?php

namespace App\Repository;

interface CenterNewsRepositoryInterface extends RepositoryInterface
{
    public function getPapers($paginate);

    public function getNews($paginate);


    public function getNewsForHome();

    public function getFirstPaperForHome();

    public function getPapersForHome();

    public function getPaginated($paginate = 8, $type = '');

}
