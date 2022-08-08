<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MySecondCommand extends Command
{
    protected $signature = 'command:start';

    public function __construct()
    {
        parent::__construct();

    }
    public function handle()
    {

        $text  = "\nsóbię\n\n"; 

        Storage::put('app/test/text.txt', $text);;
    }
}