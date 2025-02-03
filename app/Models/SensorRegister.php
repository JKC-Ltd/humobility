<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorRegister extends Model
{
    protected $fillable = ['sensor_type_id', 'sensor_model_id', 'sensor_reg_address'];

    public function sensorType(){
        return $this->belongsTo(SensorType::class);

    }

    public function sensorModel() {
        return $this->belongsTo(SensorModel::class);
    }
}

