<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorModel extends Model
{
    protected $fillable = [
        'sensor_model',
        'sensor_brand',
    ];
}
