<?php

namespace App\Http\Controllers\Api\V1\CenterNew;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\CenterNew\CenterNewService;
use Illuminate\Http\Request;

class CenterNewController extends Controller
{
    public function __construct(
        private readonly CenterNewService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function show($id){
        return $this->service->show($id);
    }
}
