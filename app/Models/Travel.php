<?php

namespace App\Models;

use App\Observers\TravelObserver;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory, Sluggable;

    public $incrementing = false;

    protected $table = 'travels';

    protected $fillable = [
        'is_public', 'name', 'slug', 'description', 'number_of_days'
    ];

    public static function booted()
    {
        static::observe(TravelObserver::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'travel_id', 'id');
    }

    public function getNumberOfNightsAttribute()
    {
        return $this->number_of_days - 1;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
