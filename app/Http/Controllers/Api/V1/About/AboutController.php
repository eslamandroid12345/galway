<?php

namespace App\Http\Controllers\Api\V1\About;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\About\AboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(
        private readonly AboutService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function show($id){
        return $this->service->show($id);
    }
    public function getAdministrative($id){
        return $this->service->getAdministrative($id);
    }
    public function getOne($id){
        return $this->service->getOne($id);
    }
}
