<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorRegister extends Model
{

    public function sensorModel() 
    {
        return $this->belongsTo(SensorModel::class);
    }

    public function sensorType() 
    {
        return $this->belongsTo(SensorType::class);
    }
}