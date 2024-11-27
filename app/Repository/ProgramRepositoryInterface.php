<?php

namespace App\Repository;

interface ProgramRepositoryInterface extends RepositoryInterface
{
    public function getProgramsByParent($id,$paginate);

}
