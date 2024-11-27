<?php

namespace App\Repository\Eloquent;

use App\Models\Member;
use App\Repository\MemberRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class MemberRepository extends Repository implements MemberRepositoryInterface
{
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }

    public function getMembersForAbout($about_id, $paginate = 8)
    {
        return $this->model::query()
                    ->where('about_id', $about_id)
                    ->latest()
                    ->with(['image','about'])
                    ->paginate($paginate);
    }
}
