<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();

        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(Request $request)
    {
        $request -> validate([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5",
        ]);

        ContactModel::create([
            "email"=>$request->get('email'),
            "subject"=>$request->get('subject'),
            "message"=>$request->get('description')
        ]);

        return redirect("/shop");
    }
}
