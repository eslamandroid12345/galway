<?php

namespace App\Http\Controllers\Api\V1\Calender;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\Calender\CalenderService;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function __construct(
        private readonly CalenderService $service ,
    ){

    }
    public function index(){
        return $this->service->index();
    }
}
