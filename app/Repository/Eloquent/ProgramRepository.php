<?php

namespace App\Repository\Eloquent;

use App\Models\Program;
use App\Repository\ProgramRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProgramRepository extends Repository implements ProgramRepositoryInterface
{
    public function __construct(Program $model)
    {
        parent::__construct($model);
    }

    public function getProgramsByParent($id,$paginate)
    {
        return $this->model::query()
            ->select(['id','title_ar','title_en' ,'desc_ar','desc_en'])
            ->where('center_programme_id', $id)
            ->with('image')
            ->orderByDesc('created_at')
            ->paginate($paginate);
    }
}
