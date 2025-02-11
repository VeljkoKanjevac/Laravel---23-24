<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function sendContact($request)
    {
        $this->contactModel->create([
            "email"=>$request->get('email'),
            "subject"=>$request->get('subject'),
            "message"=>$request->get('description')
        ]);
    }

    public function getContactById($id)
    {
        return $this->contactModel->where(['id' => $id])->first();
    }

    public function updateContact($request, $contact)
    {
        $this->contactModel->update([
            "email" => $request->get('email'),
            "subject" => $request->get('subject'),
            "message" => $request->get('description'),
        ]);
    }
}
