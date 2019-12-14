<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name', 'price', 'quantity', 'expires_at', "image_name", "company_id",
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
