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
    protected $signature = 'do:achPayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to make ACH payments';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        return Dwolla::transferMoneyAllActiveUsers(75);
    }

    public function handle_bk()
    {
        $ach = new AchPayment;

        $paymentAmount = '75';

        $achrequest = new \Illuminate\Http\Request();

        $users = User::where('is_active', 1)->get();

        $result = [];

        foreach ($users as $user) {

            $dwolla = Dwolla::where('user_id', $user['id'])->first();
            if ($dwolla) {

                $achrequest->request->add([
                    'paymentAmount' => $paymentAmount,
                    'customer_id' => $dwolla['ach_customer_id']
                ]);

                $result[] = $ach->achPaymentSubmit($achrequest);
            }
        }

        $this->info(json_encode($result, JSON_THROW_ON_ERROR | true));

        // return response()->json($ach->verifyAchCustomerBank($achrequest));
        return $result;
    }
}
