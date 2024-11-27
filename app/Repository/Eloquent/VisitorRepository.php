<?php

namespace App\Repository\Eloquent;

use App\Models\Visitor;
use App\Repository\VisitorRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class VisitorRepository extends Repository implements VisitorRepositoryInterface
{
    public function __construct(Visitor $model)
    {
        parent::__construct($model);
    }
}
