<?php

namespace App\Http\Controllers\Dashboard\Structure\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Structure\ContentController;
use App\Http\Requests\Dashboard\Structure\HomeRequest;
use App\Http\Services\Mutual\FileManagerService;
use App\Repository\StructureRepositoryInterface;
use Illuminate\Http\Request;

class HomeContentController extends ContentController
{
    protected string $contentKey='home';
    protected array $locales = ['en', 'ar'];
    public function __construct(StructureRepositoryInterface $structureRepository, FileManagerService $fileManagerService)
    {
        $this->middleware('permission:home-read')->only('index');
        $this->middleware('permission:home-update')->only('store');
        parent::__construct($structureRepository, $fileManagerService);
    }



    public function store(HomeRequest $request)
    {
//        return $request;
        return parent::_store($request);
    }
}
