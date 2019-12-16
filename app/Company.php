<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', "user_id",
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function foods()
    {
        return $this->hasMany('App\Food');
    }
}
