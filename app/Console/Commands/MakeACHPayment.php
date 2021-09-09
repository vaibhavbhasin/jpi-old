<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\AchPayment;
use App\Models\User;
use App\Models\Dwolla;

class MakeACHPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:achpayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to make ACH payments';

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
     * @return int
     */
    public function handle()
    {
        $ach = new AchPayment;

        $paymentAmount = '75';

        $achrequest = new \Illuminate\Http\Request();

        $users = User::where('is_active',1)->get();

        $result = [];

        foreach($users as $user){
            
            $dwolla = Dwolla::where('user_id', $user['id'])->first();
            if($dwolla){
            
                $achrequest->request->add([
                                        'paymentAmount' => $paymentAmount,
                                        'customer_id' => $dwolla['ach_customer_id']
                                    ]);

                $result[] = $ach->achPaymentSubmit($achrequest);
            }
        }
        
        $this->info(json_encode($result, true));
        
        // return response()->json($ach->verifyAchCustomerBank($achrequest));
        return $result;
    }
}
