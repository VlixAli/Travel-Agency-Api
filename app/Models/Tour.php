<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'travel_id', 'name', 'starting_date', 'ending_date', 'price',
    ];

    public function scopeFilter(Builder $query, $filters)
    {
        $options = array_merge([
            'priceFrom' => null,
            'priceTo' => null,
            'dateFrom' => null,
            'dateTo' => null,
            'orderBy' => null,
        ], $filters);

        $query->when($options['priceFrom'], fn ($query, $value) => $query->where('price', '>=', $value * 100));
        $query->when($options['priceTo'], fn ($query, $value) => $query->where('price', '<=', $value * 100));
        $query->when($options['dateFrom'], fn ($query, $value) => $query->where('starting_date', '>=', $value));
        $query->when($options['dateTo'], fn ($query, $value) => $query->whereDate('starting_date', '<=', $value));
        $query->when($options['orderBy'], fn ($query, $value) => $query->orderBy('price', $value));
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'travel_id', 'id');
    }

    //    public function setPriceAttribute($value)
    //    {
    //        $this->attributes['price'] = $value * 100;
    //    }
    //
    //    public function getPriceAttribute($value)
    //    {
    //        return $value / 100;
    //    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }
}
