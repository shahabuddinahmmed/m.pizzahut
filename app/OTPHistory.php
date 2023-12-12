<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPHistory extends Model
{
    protected $table = 'o_t_p_histories';
    protected $fillable = ['mobile','ip','success_status'];
}
