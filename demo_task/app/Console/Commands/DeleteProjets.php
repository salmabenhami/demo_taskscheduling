<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Projet;
class DeleteProjets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projets:delete';

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
    // Suppression de tous les projets
    Projet::truncate();

    $this->info('Tous les projets ont été supprimés avec succès.');
}

}
