<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class CheckServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:servers';

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
        exec("ping -c 10 127.0.0.1", $output, $return_var);// Change the number of packets to send to 10
        if($return_var !== 0){
            echo 'Site RB down';
        }
        else{
            echo 'Site is live and up';
        }
    }
}
