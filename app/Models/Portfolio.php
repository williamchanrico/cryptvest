<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    /**
     * User Portfolio Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Portfolio Coins Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coins()
    {
        return $this->hasMany('App\Models\Coin');
    }
}
