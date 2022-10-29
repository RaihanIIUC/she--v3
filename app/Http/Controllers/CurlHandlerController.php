<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CurlHandlerController extends Controller
{
    public static function curHander($data)
    {
        $destinationAddress = "tel:$data->phone";
        $baseUrl = 'https://developer.bdapps.com/subscription/otp/request';

        $arrayField = array(

            "applicationId" => "APP_068563",

            "password" => "7a1c7d3429b2c574007e07bf5acec366",

            "subscriberId" => $destinationAddress,

            "applicationHash" => "abcdefghsss",

            "applicationMetaData" => array(
                "client" =>  "MOBILEAPP",
                "device" =>  "Samsung S10",
                "os" =>  "android 8",
                "appCode" => "https://play.google.com/store/apps/details?id=lk"
            ),
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $baseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($arrayField),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: f5avraaaaaaaaaaaaaaaa_session_=KAFGGJEPDCEDBDPMKLCDMFGKLENHPOKHJBLCMFIJKOABBNNBEHFICLKEACGGBIMPILLDOBKBLOCHALHIPNKAILJEBMPIMKCPFMNBBFKLDLMEIKLCNLBAHMEHPKNADKEK; BIGipServerpool_developer_bdapps_com=!idJKpLd8Kh3ybdOwPDZ/109b4+LHM5uSUowzX3X2GF2s5ANFC+urTWGe5Fnu1jnGRxSw7p5MoB220Q==; TS01fb5019=01c9bf80bb43fe53592b433b465d38ab57cc4e56a50538822c0af780d2654201be9f937bea9a160aceb6f7845071678e8a4ec48f908882c6c23b7e3d75551985d0223027bf3e248e0033ac97912ce4b261e05ac9eb'
            ),
        ));

        $response = \json_decode(curl_exec($curl));

        curl_close($curl);

        return $response;
       
    }


    public function OtpPage()
    {
        return view('auth.otp_form');
    }
    
}
