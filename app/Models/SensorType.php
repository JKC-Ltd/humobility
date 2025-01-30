<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    protected $fillable = ['sensor_type_code', 'description', 'sensor_type_parameter'];
}
