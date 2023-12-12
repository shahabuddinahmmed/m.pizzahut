<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BkashPayment extends Model
{
    protected $table = 'bkash_payments';
    protected $fillable = ['transaction_id','amount','paymentID','currency','agreementID','trxID','create_desc','execute_desc','query_desc','created_time','transactionStatus'];

}
