<?php

namespace App\Http\Controllers\Dashboard\Structure\HeaderFooter;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Structure\ContentController;

use App\Http\Requests\Dashboard\Structure\HeaderFooterRequest;
use App\Http\Services\Mutual\FileManagerService;
use App\Repository\StructureRepositoryInterface;
use Illuminate\Http\Request;

class HeaderFooterController extends ContentController
{
    protected string $contentKey = 'header_footer';
    protected array $locales = ['en', 'ar'];
    public function __construct(StructureRepositoryInterface $structureRepository, FileManagerService $fileManagerService)
    {
        $this->middleware('permission:header_footer-read')->only('index');
        $this->middleware('permission:header_footer-update')->only('store');
        parent::__construct($structureRepository, $fileManagerService);
    }

    protected function store(HeaderFooterRequest $request){
//        return $request;
        return parent::_store($request);
    }
}
