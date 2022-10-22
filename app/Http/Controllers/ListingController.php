<?php

namespace App\Http\Controllers;

use listings;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
    //    dd(request('tag'));
        return view('listings.index', [
            'heading' => 'Latest Listings',
            
            // 'listings' => Listing::all(), //syntax for accessing a static method
            // display all listings starting with the latest
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // pagination
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)

        ]);
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show',[
            'heading' => "Latest Heading",
            'listing' => $listing
            // 'listing' => Listing::find($id)
    
        ] );
    }
// Show Create Form
    public function create(){
        return view('listings.create');
    }
// store listing data
public function store(Request $request){
    
    $formFields = $request->validate([
        'title'=>'required', 
        'company'=>['required', Rule::unique('listings','company')],
        'location'=>'required',
        'website'=> 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description'=> 'required'
    ]);


    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $formFields['user_id'] = auth()->id();
    // dd($formFields);
    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing Created Successfully!'); 
}

// Show Edit Form

public function edit(Listing $listing) {
    return view('listings.edit', ['listing'=> $listing]);
}

//common resource routes:
//index - show all listings
//show - Show single listing
//Create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - Delete listing

// update listing data
public function update (Request $request, Listing $listing){
    // Make sure logged in user is owner
    
    if($listing->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
    }
    $formFields = $request->validate([
        'title'=>'required', 
        'company'=>'required', 
        'location'=>'required',
        'website'=> 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description'=> 'required'
    ]);


    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }


    $listing->update($formFields);
    return back()->with('message', 'Listing Updated Successfully!'); 
}

// Delete Listing

public function destroy(Listing $listing){
    if($listing->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
    }
    
    $listing -> delete();
    return redirect('/')->with('message', 'Listing Deleted Successfully');
    
}

// Manage Listings
// public function manage(){
//     return view('listings.manage', ['listings'=>auth()->user()->listings()->get()]);

// }
 public function manage() {
        return view('listings.manage1', ['listings' => auth()->user()->listings()->get()]);
    }

}

