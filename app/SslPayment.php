<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SslPayment extends Model
{
    protected $fillable = ['order_id','amount','bank_tran_id','card_brand','card_issuer','card_issuer_country_code','card_no','card_type','status','store_amount','ipn_grab_desc','ipn_valid_desc','tran_date','tran_id','val_id'];
}
