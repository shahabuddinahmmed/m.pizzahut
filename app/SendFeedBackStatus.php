<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendFeedBackStatus extends Model
{
    protected $table = 'send_feed_back_statuses';
    protected $fillable = ['customer_id','order_id','is_due','is_hot','comment'];
}
