<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketTransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function transaction(){
       return $this->belongsTo(TicketTransaction::class);
    }
    public function ticket(){
       return $this->belongsTo(Ticket::class,'ticket_id','id')->withTrashed();
    }



    
}
