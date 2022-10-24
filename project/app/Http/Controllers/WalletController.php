<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
    public function index(){
        $user = Auth::user();
        // check if user has a wallet
        if(!$user->wallet()->count()){
            // create one if the doesn't
            $user->wallet()->create();
        }
        return view('wallet.index')->with('user', $user);
    }

    public function fundWallet(Request $request){
        $user = Auth::user();
        $amount = $request->post('amount');

        // currency convertion
        if (Session::has('currency')) 
        {
          $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        $amount = round($amount  / $curr->value, 2);

        $reference = $request->post('fundingReference');

        // verify payment using private keys
        $url = 'https://api.paystack.co/transaction/verify/'.$reference;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk_test_f2ef0994c98fa86035d9c758e9e5bc604effbc15']
        );

        //send request
        $request = curl_exec($ch);
        //close connection
        curl_close($ch);
        //declare an array that will contain the result 
        $result = array();

        if ($request) {
        $result = json_decode($request, true);
        }

        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            //Perform necessary action
            // update user balance (increment)
            $user->wallet()->update(['balance' => ($user->wallet['balance'] + $amount)]);

            // create payment object
            $payment_history = new PaymentHistory();
            $payment_history->user_id = $user->id;
            $payment_history->amount = $amount;
            $payment_history->reference = $reference;
            $payment_history->status = $result['data']['status'];
            $payment_history->save();

            // create transaction object
            $transaction = new Transaction();
            $transaction->transaction_id = 'TID'.time();
            $transaction->user_id = $user->id;
            $transaction->amount = $amount;
            $transaction->description = 'Topup';
            $transaction->is_inflow = true;
            $transaction->save();
        }

        return redirect()->route('wallet')->with('user', $user);
    }

    public function checkoutWithPaystack(Request $request)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $user_id = $request->post('user_id');
        $amount = $request->post('amount');
        $reference = $request->post('reference');

        // create payment object
        $payment_history = new PaymentHistory();
        $payment_history->user_id = $user_id;
        $payment_history->amount = $amount;
        $payment_history->reference = $reference;
        $payment_history->status = 'success';
        $payment_history->save();

        $response['message'] = "Data Saved Successfully";
        return $response;
    }

    public function checkoutWithWallet(Request $request)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);

        $user = User::find($request->post('user_id'));
        $amount = $request->post('amount');

         // currency convertion
         if (Session::has('currency')) 
         {
           $curr = Currency::find(Session::get('currency'));
         }
         else
         {
             $curr = Currency::where('is_default','=',1)->first();
         }
 
         $amount = round($amount  / $curr->value, 2);

        // update user balance (deduct)
        $user->wallet()->update(['balance' => ($user->wallet['balance'] - $amount)]);

        // create transaction object
        $transaction = new Transaction();
        $transaction->transaction_id = 'TID'.time();
        $transaction->user_id = $user->id;
        $transaction->amount = $amount;
        $transaction->description = 'Purchase';
        $transaction->is_inflow = false;
        $transaction->save();

        $response['message'] = "Data Saved Successfully";
        return $response;
    }
}
