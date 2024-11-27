<?php

namespace App\Http\Services\Api\V1\Contact;

use App\Http\Traits\Responser;
use App\Repository\ContactRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ContactService
{
    use Responser;
    public function __construct(
        private readonly ContactRepositoryInterface $repository
    )
    {
    }
    public function invoke($request){
        try {
            DB::beginTransaction();
            $data=$request->validated();
            $this->repository->create($data);
            DB::commit();
            return $this->responseSuccess(message: __('messages.Your message has been sent successfully'));
        }catch (\Exception $exception){
            DB::rollBack();
            return $this->responseFail(message: __('messages.Something went wrong'));
        }
    }
}
