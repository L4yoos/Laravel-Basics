<?php

namespace App\Console\Commands;

use App\Models\Shoptool;
use Illuminate\Console\Command;

class BaseStartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:create';

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
        $this->shopToolCreate();
    }
    private function shopToolCreate() : void
    {
        $toolshop = new Shoptool;
        $toolshop->price = 25;
        $toolshop->name = 'Młotek';
        $toolshop->quantity = 50;
        $toolshop->save();

        $toolshop = new Shoptool;
        $toolshop->price = 15;
        $toolshop->name = 'Klucz Francuski';
        $toolshop->quantity = 50;
        $toolshop->save();

        $toolshop = new Shoptool;
        $toolshop->price = 20;
        $toolshop->name = 'Gaśnica';
        $toolshop->quantity = 50;
        $toolshop->save();
    }
}
