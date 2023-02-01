<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockerTransactionDetail extends Model
{
    use HasFactory,SoftDeletes;

    public function transaction(){
        return $this->belongsTo(LockerTransaction::class);
     }
     public function ticket(){
        return $this->belongsTo(Locker::class,'locker_id','id')->withTrashed();
     }
}
