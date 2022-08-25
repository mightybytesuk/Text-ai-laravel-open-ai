<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function request(Request $request)
    {
        $request_body = [
            "prompt" => $request->prompt,
            "max_tokens" => 500,
            "temperature" => 0.7,
            "top_p" => 1,
            "presence_penalty" => 0.75,
            "frequency_penalty"=> 0.75,
            "best_of"=> 1,
            "stream" => false,
            ];
            $apiKey = env('APP_APIKEY');
            $postfields = json_encode($request_body);
            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.openai.com/v1/engines/text-davinci-002/completions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer '.$apiKey 
            ],
            ]);
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
    
            curl_close($curl);
    
            if ($err) {
                echo "Error #:" . $err;
            } else {
                echo $response;
            }

        
    }
}
