<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
Route::get('/', [ListingController::class, 'index']);


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listing
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');
//Single Listing

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

//Show Register/ate FCreorm
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

