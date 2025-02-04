<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SensorModel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'sensor_model',
        'sensor_brand',
    ];
}
