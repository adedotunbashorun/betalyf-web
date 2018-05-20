<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Beneficiary;
use Twilio;

class Sms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Sms:sendAlert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Alert To User';

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
            $msg = "Dear $b->parent_name, Your child is due for OPV1, Penta1, PCV1 and Rota1 vaccines tomorrow.";         
            Twilio::message($b->telephone, $msg);
        }
            
    }
}
