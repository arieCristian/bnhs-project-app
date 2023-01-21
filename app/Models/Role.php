<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public const IS_OWNERS = 1 ;
    public const IS_ADMIN = 2 ;
    public const IS_BAR = 3 ;
    public const IS_TICKET = 4 ;
    public const IS_LOKET = 5 ;

    public function user()
    {
        return $this->hasMany(User::class)->withTrashed();
    }
    
}
