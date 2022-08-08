<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class MyThirdCommand extends Command
{
    protected $signature = 'command:cmd';

    public function __construct()
    {
        parent::__construct();

    }
    public function handle()
    {
        $process = new Process(['date']);
        $process->run();

        echo $process->getOutput();
        
    }
}