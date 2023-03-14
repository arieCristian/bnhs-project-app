<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockerTransactionDetail extends Model
{
   use HasFactory,SoftDeletes;
   
   protected $guarded = ['id'];
   protected $table = 'locker_transaction_details';

   public function transaction(){
      return $this->belongsTo(LockerTransaction::class,'locker_transaction_id','id');
   }
   public function locker(){
      return $this->belongsTo(Locker::class,'locker_id','id')->withTrashed();
   }
}
