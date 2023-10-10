<?php

use App\Mail\Welcome;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Mailing route

Route::get('/email', function() {
    Mail::to('')->send(new WelcomeMail()); // Write your Mailtrap email inside the parameter section after "to" inside the braces
    return new WelcomeMail();
});

Route::get('/test-user', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'is-active']);