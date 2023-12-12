<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationLog extends Model
{
    protected $table = 'location_logs';
    protected $fillable = ['user_id','location','longitude','latitude'];
}
