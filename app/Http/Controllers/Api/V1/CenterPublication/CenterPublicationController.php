<?php

namespace App\Http\Controllers\Api\V1\CenterPublication;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\CenterPublication\CenterPublicationService;
use Illuminate\Http\Request;

class CenterPublicationController extends Controller
{
    public function __construct(
        private readonly CenterPublicationService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function show($id){
        return $this->service->show($id);
    }
}
