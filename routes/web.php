<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome/', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('listings');
});

// passing data

// all listings
Route::get('/', function (){
    return view('listgigs', [
        'heading' => 'Latest Listings',
        // 'listings' => [
        //     [
        //         'id' => 1,
        //         'title' => 'Listing One',
        //         'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, commodi.'

        //     ], 
        //     [
        //         'id' => 2,
        //         'title' => 'Listing two',
        //         'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, commodi.'

        //     ]

        // 
        'listings' => Listing::all() //syntax for accessing a static method
        
    ]);
});

// Single Listing

Route::get('/listings/{id}', function($id){
    return view('listing',[
        'heading' => "Latest Heading",
        'listings' => Listing::find($id)

    ] );
});





Route::get('/hello', function(){
    // return 'Hello World';
    // response takes in what you want to render, status. the status is 200 by default. 
    // we can add a header. 
    return response('<h1>Hello world</h1>', 200)
    ->header('Content-Type', 'text/html')
    ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    ddd($id); //dumo, die, debug. Used for debugging. 
    
    return response('Post' . $id);
})->where('id', '[0-9]+'); //here we have put a constraint. we are using regular expressions to do so. for this specific regular expression, ids which are numbers are the only ones to be accepted. 

Route::get('/search', function(Request $request){
    dd($request->name. ' '. $request->city);
});