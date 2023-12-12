<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\APIClient;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class bKashController extends Controller
{

    private $access_token;

    public function getToken(Request $request){
        $data = [];
        $status = true;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'issID'      => 'required|numeric|digits:11'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only("name", "password");
        $issID = $request->input('issID');
        if (! $token = auth('api')->claims(['issID' => $issID])->attempt($credentials)) {
            $status = false;
            $errors = [
                "login" => "Invalid username or password",
            ];
            $message = "Login Failed";
        }else {
            $message = "Login Successfull";
            Session::put($token,$issID);
            $data = [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ];
        }

        return Response::json(compact('message','data','status'));


//            if ($user == null) {
//            $status = false;
//            $errors = [
//                "login" => "Invalid username or password",
//            ];
//            $message = "Login Failed";
//            $data = [];
//        }else{
//            $token = $token = JWTAuth::fromUser($user);
////            $this->access_token = $token;
////            Session::put('accessToken',$token);
//            $message = "Login Successfull";
//            $data = [
//                'access_token' => $token,
//                'token_type' => 'bearer',
//                'expires_in' => 60*60
//            ];
//        }

    }

    public function index($token)
    {
            $payload = auth('api')->payload();
            Session::put('bkashClient', true);
            Session::put('token', $token);
            $mobile = $payload['issID'];
            $phone_number = substr($mobile, -11);
            $customer = Customer::where('phone_number', 'like', '%' . $mobile)->first();
            if (!$customer) {
                $new_customer = new Customer();
                $new_customer->phone_number = $phone_number;
                if ($new_customer->save()) {
                    Session::put('UserId', $new_customer->id);
                    Session::put('UserName', $new_customer->first_name);
                    return redirect()->route('/')->with('message', 'Thanks for your Registration');
                }
            } else {

                Session::put('UserId', $customer->id);
                Session::put('UserName', $customer->first_name);
                return redirect()->route('/')->with('message', 'Thanks for your login');

            }

    }

}
