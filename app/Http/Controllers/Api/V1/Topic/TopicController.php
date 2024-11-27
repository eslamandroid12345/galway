<?php

namespace App\Http\Controllers\Api\V1\Topic;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\Topic\TopicService;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function __construct(
        private readonly TopicService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function show($id){
        return $this->service->show($id);
    }
}
