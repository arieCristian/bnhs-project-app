<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public const IS_INTER = 1 ;
    public const IS_TOUR = 2 ;
    public const IS_LOCAL = 3 ;
}
