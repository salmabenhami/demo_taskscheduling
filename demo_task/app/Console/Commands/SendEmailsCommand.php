<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    protected $signature = 'email:send';
    protected $description = 'Envoie un email via une commande artisan.';

    public function handle()
    {
        Mail::raw('Ceci est un e-mail envoyé via une commande artisan.', function($message) {
            $message->to('benhamisalma22@gmail.com')->subject('Test Commande Artisan');
        });

        \Log::info("✅ E-mail envoyé via la commande `email:send` !");
        $this->info('✅ E-mail envoyé avec succès !');
    }
}
