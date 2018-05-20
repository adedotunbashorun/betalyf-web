<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio;
use App\Information;
use App\Beneficiary;

class InfecteousInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Infecteous:SmsAlert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send information on infecteous disease';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $beneficiary = Beneficiary::all();
        foreach ($beneficiary as $key => $b) { 
            $msg = Information::inRandomOrder()->first()->message;
            if(!empty($msg)){
                Twilio::message($b->telephone, $msg);
            }            
        }
    }
}
