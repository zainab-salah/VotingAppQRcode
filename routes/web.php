<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('vote.form');
    return view('welcome');
});
// routes/web.php


Route::get('/vote', function () {
     return view('vote.form');
    
});
Route::get('/vote', [VoteController::class, 'showForm'])->name('show.vote.form');
Route::post('/vote', [VoteController::class, 'submitVote'])->name('submit.vote');
Route::view('/thankyou', 'thankyou')->name('thankyou');
