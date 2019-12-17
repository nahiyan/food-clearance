<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "user_id", "food_id", "quantity", "price",
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function food()
    {
        return $this->belongsTo('App\Food');
    }
}
