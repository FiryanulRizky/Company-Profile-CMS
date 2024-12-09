<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function contact()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    function contactinsert(Request $request)
    {
        $info = Contact::create($request->except('_token'));
        return back()->with('status', 'Contact insert successfully!!');
    }

    function contactedit($contact_id)
    {
       $contact_info =  Contact::findorFail($contact_id);
       return view('contact.edit' , compact('contact_info'));
    }

    function contactupdate(Request $request, $id)
    {
        Contact::findOrFail($request->id)->update([
            'description' => $request->description,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'twitter' => $request->twitter,
            'fb' => $request->fb,
            'google' => $request->google,
            'linkedin' => $request->linkedin,

        ]);
        return redirect('contact')->withEditstatus('Contact Edited successfully!!');
    }

    function contactdelete($contact_id)
    {
        // $contact = Contact::findorFail($contact_id);
        Contact::findOrFail($contact_id)->delete();
        return back()->with('deletestatus', 'About deleted successfully!!');
    }

    function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10',
        ]);
        Mail::to('destination@example.com')->send(new ContactMail($validated));
        return back()->with('success', 'Thank you for your message!');
    }
}
