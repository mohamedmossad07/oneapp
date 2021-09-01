<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'password',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
