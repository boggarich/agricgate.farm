<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DonateController extends Controller
{
    //
    public function create()
    {

        return view('frontend.donate.create');

    }

    public function charge(Request $request) {

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
          'reference' => 'agricgate.farm' . Str::random(40),
          'mobile_money' => [
            'provider' => $request->provider,
            'phone' => $request->phone,
           ]
        ];
      
        $fields_string = http_build_query($fields);
      
        $ch = curl_init();
        
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
          "Cache-Control: no-cache",
        ));
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);

        return $result;

    }

}
