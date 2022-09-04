<?php

namespace App\Console\Commands;

use App\Models\Shoptool;
use Illuminate\Console\Command;

class ForloopforShoptool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'for:loop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo(count(Shoptool::all()));
    }
}
