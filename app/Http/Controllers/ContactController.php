<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        $companys = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

        // dd($companys);
        $contacts = \App\Models\Contact::orderBy('first_name','asc')->where(function($query){
            if(request()->has('company_id') && request()->input('company_id') != ''){
                $query->where('company_id', request('company_id'));
            }
        })->paginate(10);
        
        // paginate(10);
        return view('contacts.index', compact('contacts', 'companys'));
    }
    function create()
    {
        return view('contacts.create');
    }
    function store(Request $request)
    {
        $contact = new \App\Models\Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->route('contacts.index');
    }
    function show($id)
    {
        $contact = \App\Models\Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
    
}
