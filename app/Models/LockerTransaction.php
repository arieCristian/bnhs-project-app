<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockerTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    public function detail(){
        return $this->hasMany(LockerTransactionDetail::class)->withTrashed();
    }
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
}
