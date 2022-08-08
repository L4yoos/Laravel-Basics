<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyFirstCommand extends Command
{
    protected $signature = 'command:start {phones}';

    public function __construct()
    {
        parent::__construct();

    }
    public function handle()
    {
        $phones  = $this->argument('phones');

        $wynik = explode(',', $phones  );;

        $new_arr = array_map('trim', explode('-', $phones  ));

        var_dump( $new_arr );

        //dd( 'Wprowadziłeś następujące numery: ' .$phones );
//pierwszy argument to jeden znak tzn nie puscisz 22300051,22300052 tylko musisz dac w "22300051,22300052"
    }
}