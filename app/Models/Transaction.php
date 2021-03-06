<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "user_id", "food_id", "quantity", "price",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function food()
    {
        return $this->belongsTo('App\Models\Food');
    }
}
