<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();

        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(SendContactRequest $request)
    {
        $this->contactRepo->sendContact($request);

        return redirect("/shop");
    }

    public function deleteContact($contact)
    {
        $singleContact = $this->contactRepo->getContactById($contact);

        if($singleContact === null)
        {
            die("Ovaj kontakt ne postoji");
        }

        $singleContact->delete();

        return redirect()->route('allContacts');
    }

    public function getContactById(ContactModel $contact)
    {
        return view('updateContact', compact('contact'));
    }

    public function updateContact(SendContactRequest $request,ContactModel $contact)
    {
        $this->contactRepo->updateContact($request, $contact);

        return redirect()->route('allContacts');
    }
}
