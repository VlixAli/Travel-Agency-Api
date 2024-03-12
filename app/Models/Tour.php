<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
      'id', 'travel_id', 'name', 'starting_date', 'ending_date', 'price'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'travel_id', 'id');
    }

    public function setPriceAttribute($value)
    {
         $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }
}
