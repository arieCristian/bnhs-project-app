<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarTransactionDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];
    public function transaction(){
        return $this->belongsTo(BarTransaction::class,'bar_transaction_id','id');
    }
    public function bar(){
        return $this->belongsTo(Bar::class,'bar_id','id')->withTrashed();
    }
}
