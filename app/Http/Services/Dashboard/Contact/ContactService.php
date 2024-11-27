<?php

namespace App\Http\Services\Dashboard\Contact;

use App\Repository\ContactRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function __construct(
        private readonly ContactRepositoryInterface $repository,
    )
    {

    }

    public function index()
    {
        $contacts = $this->repository->paginate(20,  orderBy: 'DESC');
        return view('dashboard.site.contacts.index', compact('contacts'));
    }

    public function show(string $id)
    {
        $contact = $this->repository->getById($id);
        return view('dashboard.site.contacts.show', compact('contact'));
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $this->repository->delete($id);
            DB::commit();
            return redirect()->route('contacts.index')->with(['success' => __('messages.deleted_successfully')]);
        } catch (\Exception $e) {
            DB::rollBack();
//            return $e;
            return back()->with(['error' => __('messages.Something went wrong')]);
        }
    }
}
