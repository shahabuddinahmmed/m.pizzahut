<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Model implements JWTSubject
//class Customer extends Model
{
    protected $fillable =['phone_number','email_address','first_name','device_token'];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
        public function orders()
    {
        return $this->hasMany('App\Order','customer_id','id');
    }

    public function customer_locations(){
        return $this->hasMany('App\CustomerLocation','customer_id','id');
    }

    public static function is_call_center(){
        $is_call_center = 0;
        if(Session::has('UserId')) {
            $customer = self::find(Session::get('UserId'));
            return $is_call_center = $customer->is_call_center;
        }
        return $is_call_center;
    }
    public static function getUserID(){
        $user_id = '';
        if(self::is_call_center()){
            if(Session::has('CustomerId')){
                $user_id = Session::get('CustomerId');
            }
        }else{
            if(Session::has('UserId')){
                $user_id = Session::get('UserId');
            }
        }
        return $user_id;
    }
    public function callCenterMakeOrder(){
        if ($this->is_call_center) {
            if (!Session::has('CustomerMobile')) {
                return true;
            }else{
                $customer = self::where('phone_number', '=', Session::get('CustomerMobile'))->get()->first();
//                return $customerDetails;
                if ($customer)
                    Session::put('CustomerId', $customer->id);
                if ($customer->first_name)
                    Session::put('CustomerName', $customer->first_name);
                if ($customer->email_address)
                    Session::put('CustomerEmail', $customer->email_address);
                if ($customer->phone_number)
                    Session::put('CustomerMobile', $customer->phone_number);
                if ($customer->address)
                    Session::put('CustomerAddress', $customer->address);

            }
        }else {
            Session::put('CustomerId', $this->id);
            if ($this->first_name)
                Session::put('CustomerName', $this->first_name);
            if ($this->email_address)
                Session::put('CustomerEmail', $this->email_address);
            if ($this->phone_number)
                Session::put('CustomerMobile', $this->phone_number);
            if ($this->address)
                Session::put('CustomerAddress', $this->address);
        }
        return false;
    }
}
