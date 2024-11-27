<?php

namespace App\Repository;

interface TreeStructureRepositoryInterface extends RepositoryInterface
{
    public function getTreesForAbout($about_id, $paginate = 8);
    public function getTrees($about_id);

}
