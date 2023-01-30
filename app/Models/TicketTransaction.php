<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketTransaction extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    public function detail(){
        return $this->hasMany(TicketTransactionDetail::class)->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function cencel(){
        return $this->hasMany(CencelledTicketTransaction::class);
    }
}
