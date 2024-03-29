<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class oeeDetail extends Model
{
    use HasFactory;

    protected $table = 'oee_details';

    protected $fillable = [
        'oeeMasterId',
        'productId',
        'machineId',
        'tempExtruderId',
        'zoneNumber',
        'adapterZone',
        'oeeDetailValue',
        'date',
        'time',
        'screwSpeed',
        'dosingSpeed',
        'mainDrive',
        'vacumCylinder',
        'meltPressure',
        'vacumTank',
        'haulOffSpeed',
        'waterTempVacumTank',
        'waterPressure',
    ];

    protected $hidden = [];

    public function oeeMaster() {
        return $this->hasMany(oeeMaster::class, 'id', 'oeeMasterId');
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'productId');
    }

    public function machine() {
        return $this->hasOne(Machine::class, 'id', 'machineId');
    }

    public function tempExtruder() {
        return $this->hasOne(TempExtruder::class, 'id', 'tempExtruderId');
    }
    public function defect(){
    //   return $this->hasManyThrough(OeeDefectLogProduct::class,oeeDetail::class,'oeeMasterId','productId');
    // return $this->belongsToMany(OeeDefectLogProduct::class,'oee_details','id', 'productId');
        return $this->hasMany(OeeDefectLogProduct::class,'productId','productId');
    }
}
