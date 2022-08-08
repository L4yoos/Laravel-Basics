<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestCommand extends Command
{
    protected $signature = 'command:test';

    public function __construct()
    {
        parent::__construct();

    }
    public function handle()
    {
    }
}