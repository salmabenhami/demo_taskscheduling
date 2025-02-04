<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProjetController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/projets',ProjetController::class);
use App\Http\Controllers\MailController;

use App\Jobs\SendEmailJob;


Route::get('/send-email', function () {
    SendEmailJob::dispatchSync('benhamisalma2@gmail.com');
    return "E-mail de test envoyé !";
});