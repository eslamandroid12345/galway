<?php

namespace App\Http\Controllers\Api\V1\CenterProgramme;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\CenterProgramme\CenterProgrammeService;
use Illuminate\Http\Request;

class CenterProgrammeController extends Controller
{
    public function __construct(
        private readonly CenterProgrammeService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
    public function navItems(){
        return $this->service->navItems();
    }
    public function show($id){
        return $this->service->show($id);
    }
    public function showSymposium($id){
        return $this->service->showSymposium($id);
    }
}
