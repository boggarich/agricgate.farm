<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Donate;
use Carbon\Carbon;

class DonateController extends Controller
{
    //
    public function verify(Request $request) {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$request->transaction_ref,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".env('PAYSTACK_SECRET_KEY'),
            "Cache-Control: no-cache",
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        
        if ($err) {

          return "cURL Error #:" . $err;

        } else {

          $response = json_decode($response);

          if($response->status) {
 
              if($response->data->status == 'success') {

                Donate::firstOrCreate([

                    ['transaction_ref', $response->data->reference],
                    [
                      'amount' => $response->data->amount,
                      'channel' => $response->data->channel,
                      'verified_at' => Carbon::now(),
                    ]

                ]);

              }

          }

          return $response;

        }

    }

    public function create_verify() {

      return view('frontend.donate.verify');

    }

    public function send_otp(Request $request) {

      return true;

    }

    public function create_otp(Request $request) {

      return view('frontend.donate.send-otp', 
                    ['transaction_ref' => $request->transaction_ref]
                 );

    }

    public function create_charge()
    {

        return view('frontend.donate.create');

    }

    public function charge(Request $request) {

        if($request->channel == 'mobile_money') {

            $validate = $request->validate([
                'amount' => ['required'],
                'email' => ['nullable'],
                'phone' => ['required'],
                'provider' => ['required']
            ]);

            $url = "https://api.paystack.co/charge";

            $fields = [
              'email' => $request->email,
              'amount' => $request->amount * 100,
              'reference' => Str::random(40),
              'mobile_money' => [
                'provider' => $request->provider,
                // 'phone' => $request->phone,
                'phone' => '0551234987'
              ]
            ];
      
            $fields_string = http_build_query($fields);
          
            $ch = curl_init();
            
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Authorization: Bearer ".env('PAYSTACK_SECRET_KEY'),
              "Cache-Control: no-cache",
            ));
            
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            $result = curl_exec($ch);

            $result = json_decode($result);

            /* MTN / AirtelTigo */

            if($result->data->status == 'success') {

              return redirect()->route('donate.create-verify', 
                                ['transaction_ref' => $result->data->reference]
                              );

            };

            /* Vodafone */

            // if($result->data->status == 'send_otp') {

            //     return redirect()->route('donate.create-otp', 
            //                       ['transaction_ref' => $result->data->reference]
            //                     );

            // };

        }

    }

}
