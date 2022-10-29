<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CurlHandlerController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nid' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:13', 'unique:users'],
            'name' => ['required', 'max:50'],
            'district' => ['required'],
            'reff' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nid' => $request->nid,
            'phone' => $request->phone,
            'name' => $request->name,
            'district' => $request->district,
            'reff' => $request->reff,
            'password' => Hash::make($request->password),
        ]);

        
        // event(new Registered($user));




         $otpResponse = CurlHandlerController::curHander($request);



         if($otpResponse->statusCode == 'S1000'){
            session()->put('referenceNo', $otpResponse->referenceNo);

                    $data = collect($request); 
                    session()->put('user', $data);
                    Auth::login($user);

           // putting user creation data for creation of user 
            return view('auth.otp_form',\compact('otpResponse'));
        }else{
            return back()->with('otpError', $otpResponse->statusDetail);
        }
    }

    public function OtpSubmit(Request $request)
    {

        $status = $this->otpRecievers($request);

    
        if ($status['statusCode'] == "S1000"){
            return redirect(RouteServiceProvider::HOME);
        }else{
            session()->flash('error',$status['statusDetail']); 
            return \redirect()->route('otp_page');
        }
        
    }

    public function otpRecievers($data)
    {
      $referenceNo =  session()->get('referenceNo');

        $otpFields = array(
            "applicationId" => "APP_068563",
            "password" => "7a1c7d3429b2c574007e07bf5acec366",
            "otp" => $data->otp,
            "referenceNo" => $referenceNo
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://developer.bdapps.com/subscription/otp/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => \json_encode($otpFields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: f5avraaaaaaaaaaaaaaaa_session_=DNFPKLNCPKOJPKHOIJLPLCFEAPLIEDNBIFMADPFDMFDBKJMAKJPJNJDHBOMIFKDDNPJDBLJABJNHKKEJGKFAHGPIPNENJDJPGPKKOPNLFAMPKIOLHMCEGFLIEIAJCEPG; BIGipServerpool_developer_bdapps_com=!idJKpLd8Kh3ybdOwPDZ/109b4+LHM5uSUowzX3X2GF2s5ANFC+urTWGe5Fnu1jnGRxSw7p5MoB220Q==; TS01fb5019=01c9bf80bb4c25d07aa6e6398db2e6812dd781b38681a154214cf401e7a3814239fb9bbc4e91b0c27ff14632c55207cb839a958eb22a2e126f79140209decefcb67f01c1c3c4d040026a1b7a149be0a78a48f9e9ad'
            ),
        ));

        $response = \json_decode(curl_exec($curl));

        curl_close($curl);

        $data['statusCode'] = $response->statusCode;
        $data['statusDetail'] = $response->statusDetail;
        return $data;
   
    }

}
