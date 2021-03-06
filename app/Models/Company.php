<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', "user_id",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }
}
