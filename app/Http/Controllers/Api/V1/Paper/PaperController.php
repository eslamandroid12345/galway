<?php

namespace App\Http\Controllers\Api\V1\Paper;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\Paper\PaperService;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function __construct(
        private readonly PaperService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function show($id){
        return $this->service->show($id);
    }
}
