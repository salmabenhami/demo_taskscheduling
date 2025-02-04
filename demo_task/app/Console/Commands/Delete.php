<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Delete
{
    // Cette classe est maintenant invocable

    public function __invoke()
    {
        DB::table('projets')->delete(); 
    }
}
