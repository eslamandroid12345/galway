<?php

namespace App\Repository\Eloquent;

use App\Models\Answer;
use App\Models\Structure;
use App\Repository\AnswerRepositoryInterface;
use App\Repository\QuestionRepositoryInterface;
use App\Repository\StructureRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StructureRepository extends Repository implements StructureRepositoryInterface
{
    protected Model $model;

    public function __construct(Structure $model){
        parent::__construct($model);
    }

    public function structure($key)
    {
        return $this->model::query()->where('key', $key)->first();
    }

    public function publish($key, $content)
    {
        return $this->model::query()->updateOrCreate(['key' => $key], ['content' => $content]);
    }

    public function getContent($keys=[]){
        $data= $this->model::query()->whereIn('key',$keys)->get(['key','content']);
        $result=[];
        foreach ($data as $item){
            $result[$item->key]=$item->data;
        }
        return $result;
    }

}
