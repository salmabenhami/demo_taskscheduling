<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class MailController extends Controller
{
    use App\Jobs\SendEmailJob;

public function register(Request $request)
{
    // Valider et créer l'utilisateur...

    // Exécuter le travail
    // SendEmailJob::dispatch($user);
}
}
