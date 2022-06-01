<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    function index()
    {
        $user = auth()->user();
        $companys =  $user->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        // \DB::enableQueryLog();
        // dd($companys);
        $contacts = $user->contacts()->with('company')->latestLast()->paginate(10);
        
        
       
        // dd(\DB::getQueryLog());
        
        // paginate(10);
        return view('contacts.index', compact('contacts', 'companys'));
    }
    function create()
    {
        $companys = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        
        $contact = new \App\Models\Contact;
        return view('contacts.create', compact('companys', 'contact'));
    }
    function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companys,id',
        ]);
        $contact = \App\Models\Contact::create($request->all()+['user_id' => auth()->id()]);
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');

    }
    function show($id)
    {
        $contact = \App\Models\Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
    function edit($id)
    {
        $contact = \App\Models\Contact::findOrFail($id);
        $companys = auth()->user()->companies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.edit', compact('contact', 'companys'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companys,id',
        ]);
        $contact = \App\Models\Contact::findOrFail($id);
        $contact->update($request->all()+['user_id' => auth()->id()]);
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }
    function destroy($id)
    {
        
        
        $contact = \App\Models\Contact::findOrFail($id);
        $contact->delete();
        
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
