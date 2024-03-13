<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::observe(RoleObserver::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
