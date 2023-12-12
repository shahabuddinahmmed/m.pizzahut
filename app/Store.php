<?php

namespace App;

use App\Helpers\HelperClass;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['tag','name','contact_number','home_service_number','ac_number','business_solution_number',
        'rgm_contact_number','email','location','start_time','end_time','is_active'];
    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','products_stores','store_id','product_id');
    }

    public function storeActivity(){
        if($this->is_active)
            return HelperClass::timeOnly($this->start_time) . ' - ' . HelperClass::timeOnly($this->end_time);
        else
            return 'Closed';
//        {!! Help::timeOnly($store->start_time) !!} - {!! Help::timeOnly($store->end_time) !!}
//        {!! Help::timeOnly($store->start_time) !!} - {!! Help::timeOnly($store->end_time) !!}

    }

    public function isNotOpen(){
        if (!$this->is_active) {
            return true;
        }
        elseif (time() < (strtotime($this->start_time)) || (time() > strtotime($this->end_time))) {
            return true;
        }
//        elseif (time() > $this->end_time) {
//            return true;
//        }
        else{
            return false;
        }
    }
    public function HandleErrorMessage(){
        if (!$this->is_active) {
            return redirect()->route('/')->with('message', $this->name . ' is close Today');
        }
        elseif (time() < (strtotime($this->start_time)) || (time() > strtotime($this->end_time))) {
            return redirect()->route('/')->with('message', $this->name . ' open from ' . HelperClass::timeOnly($this->start_time) . ' To ' . HelperClass::timeOnly($this->end_time));
        }
//        elseif (time() > strtotime($this->end_time)) {
//            return redirect()->route('/')->with('message', 'Sorry, We are not taking order after 8:30 pm, please try us tomorrow');
//        }
    }
    public function deliveryDay(){
        $current_time = strtotime('+29 minutes');
        $start_time = strtotime($this->start_time);
        $end_time = strtotime($this->end_time.' '.'+29 minutes');
        if ($current_time > $end_time) {
            $delivery_day = 'Tomorrow';
        }
        else{
            $delivery_day = 'Today';

        }
        return $delivery_day;
    }
    public function deliveryDate(){
        $end_time = strtotime($this->end_time.' '.'+29 minutes');
        if (time() > $end_time) {
            $d_date = HelperClass::addDate('+1');
        }
        else{
            $d_date = date("Y-m-d");
        }
        return HelperClass::formatDate($d_date);
    }
    public function setOrderTime(){
        $hours = array();
        $d_date = date("Y-m-d");
//                return $delivery_date;
        $delivery_day = 'Today';
        $current_time = strtotime('+29 minutes');
        $start_time = strtotime($this->start_time);
        $end_time = strtotime($this->end_time.' '.'+29 minutes');
//                return $current_time . '*' . $end_time;
        if (time() > $end_time) {
            $d_date = HelperClass::addDate('+1');
            $start_time = strtotime($d_date . ' ' . $this->start_time);
            $end_time = strtotime($d_date . ' ' . $this->end_time);
            $current_time = $start_time;
            $delivery_day = 'Tomorrow';
        }
//                if(11:30 < 12:00 && 12:00 < 22:30)
        if ($start_time < $current_time && $current_time < $end_time) {
            $hours[date("Y-m-d H:i:s",$current_time)] = 'ASAP';
        }
        for ($i = $start_time; $i <= $end_time; $i = $i + 900) {
            if ($i >= $current_time) {
                $hours[date("Y-m-d H:i:s", $i)] = date('h:i A', $i);
            }
        }
//        $delivery_date = HelperClass::formatDate($d_date);
//        $default_datetime = array_keys($hours)[0];
//        $default_time = array_values($hours)[0];
//                if(Session::has('CustomerMobile')){
//                    $customer_mobile = Session::get('CustomerMobile');
//                }
        return $hours;
    }


}
