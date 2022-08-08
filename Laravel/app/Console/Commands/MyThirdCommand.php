<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MyThirdCommand extends Command
{
    protected $signature = 'command:startthird';

    public function __construct()
    {
        parent::__construct();

    }
    public function handle()
    {

        $nazwapliku = 'storage/app/app/test/text.txt';

        $cos = '"UDAŁO SIĘ!"';
        $cos .= file_get_contents($nazwapliku);
        file_put_contents($nazwapliku, $cos);

        $text = '' . PHP_EOL . '" [tuNic Nie Ma] "'  . PHP_EOL . '"test@$"<działa*()%> "';
        $fp = fopen($nazwapliku, 'a');
        fwrite($fp, $text);
        fclose($fp);
    }
}