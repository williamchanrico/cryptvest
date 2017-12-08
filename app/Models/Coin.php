<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'cost',
        'note'
    ];

    public function portfolio()
    {
        return $this->belongsTo('App\Models\Portfolio');
    }
}
