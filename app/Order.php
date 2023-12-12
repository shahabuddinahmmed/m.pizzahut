<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','store_id','total_tax','delivery_charge','delivery_vat',
        'total_price','discount','order_total','order_type','response_time','order_status',
        'send_notification','app_type','is_active','is_deleted','status_description','is_readable'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function shipping_detail()
    {
        return $this->hasOne('App\ShippingDetail');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }


    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function billing_detail()
    {
        return $this->hasOne('App\BillingDetail');
    }

    public function setReadable()
    {
        if (!$this->is_readable) {
            $this->is_readable = true;
            $this->save();
        }
    }
    public function updateStatus($status){
        $this->order_status = $status;
        $this->save();
    }
    public function activate(){
        $this->update(['is_active'=>true]);
    }
    public function updatePaymentStatus($status){
        $this->billing_detail()
            ->update([
                'payment_status'=> 'Paid'
            ]);
        if($status == 'Paid')
            $this->update(['is_active'=>1]);
    }
}
