<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPubliqueEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Liste des destinataires.
     */
    protected $emails;

    /**
     * Créer une nouvelle instance du Job.
     */
    public function __construct()
    {
        $this->emails = ['test1@example.com', 'test2@example.com']; // Remplace avec des e-mails valides
    }

    /**
     * Exécuter le job.
     */
    public function handle()
    {
        foreach ($this->emails as $email) {
            Mail::raw('🚀 Ceci est un test d’e-mail de Laravel Scheduler !', function ($message) use ($email) {
                $message->to($email)->subject('🔔 Notification Laravel');
            });
        }
    }
}
