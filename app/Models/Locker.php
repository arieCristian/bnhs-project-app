<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locker extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [
        'id'
    ];
    public function detail(){
        return $this->hasMany(LockerTransactionDetail::class,'locker_id','id');
    }
}
