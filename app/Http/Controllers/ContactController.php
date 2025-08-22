<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

       
        Contact::create($validated);

        return redirect()->back()->with('success', 'Message sent successfully ');
    }

    public function index()
    {
           $contacts = Contact::get();
           return view('dashboard.contacts', compact('contacts'));
    }
       
    public function destroy($id)
    {
           $contact = Contact::findOrFail($id);
           $contact->delete();
           return redirect()->back()->with('success', 'Message deleted successfully ');
    }

}
