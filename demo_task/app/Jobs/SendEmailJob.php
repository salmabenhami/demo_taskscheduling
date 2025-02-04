<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Exécution du job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::raw('Ceci est un e-mail envoyé via un Job Laravel.', function($message) {
            $message->to('benhamisalma22@gmail.com')->subject('Test Job Laravel');
        });

        \Log::info("✅ E-mail envoyé via le Job `SendEmailJob` !");
    }
}



// // class SendEmailJob implements ShouldQueue
// // {
// //     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

// //     protected $email;

// //     /**
// //      * Créer une nouvelle instance du job.
// //      *
// //      * @param string $email
// //      */
// //     public function __construct($email)
// //     {
// //         $this->email = $email;
// //     }

// //     /**
// //      * Exécuter le job.
// //      *
// //      * @return void
// //      */
    
    
// //     public function handle()
// //     {
// //         Mail::raw("test", function($message) {
// //             $message->to('benhamisalma22@gmail.com')->subject('test');
// //         });
// //     }
    
// //}
// class SendEmailJob implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     public function __construct() {} // Pas de paramètre

//     public function handle()
//     {
//         Mail::raw("test", function($message) {
//             $message->to('benhamisalma22@gmail.com')->subject('test');
//         });

//         \Log::info("Email envoyé par SendEmailJob");
//     }
// }

