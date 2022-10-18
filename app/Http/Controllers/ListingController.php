<?php

namespace App\Http\Controllers;

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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
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

    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing Created Successfully!'); 
}



//common resource routes:
//index - show all listings
//show - Show single listing
//Create - show form to create new listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - Delete listing





}

