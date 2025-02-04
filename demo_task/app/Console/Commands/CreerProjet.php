<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Projet;

class CreerProjet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creer:projet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $projet = new Projet();
        $projet->nom = 'Projet ' . now()->format('Y-m-d H:i:s');  
        $projet->status = 'En cours';  
        $projet->save();  
    }
}
