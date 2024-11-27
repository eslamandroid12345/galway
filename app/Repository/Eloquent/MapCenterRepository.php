<?php

namespace App\Repository\Eloquent;

use App\Models\MapCenter;
use App\Repository\MapCenterRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MapCenterRepository extends Repository implements MapCenterRepositoryInterface
{
    public function __construct(MapCenter $model)
    {
        parent::__construct($model);
    }
}
