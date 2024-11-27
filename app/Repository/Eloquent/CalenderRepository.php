<?php

namespace App\Repository\Eloquent;

use App\Models\Calender;
use App\Repository\CalenderRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CalenderRepository extends Repository implements CalenderRepositoryInterface
{
    public function __construct(Calender $model)
    {
        parent::__construct($model);
    }

    public function getDates()
    {
        return $this->model::query()
            ->whereMonth('date', request()->month)
            ->whereYear('date', request()->year)
            ->get();
    }

}
