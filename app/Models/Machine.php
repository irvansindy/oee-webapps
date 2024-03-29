<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Machine extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'machines';
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function DieHead() {
        return $this->belongsTo(DieHead::class, 'id', 'machineId');
    }
}
