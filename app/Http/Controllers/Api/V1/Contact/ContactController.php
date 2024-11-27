<?php

namespace App\Http\Controllers\Api\V1\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Contact\ContactRequest;
use App\Http\Services\Api\V1\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $service
    ){

    }
    public function __invoke(ContactRequest $request)
    {
        return $this->service->invoke($request);
    }
}
