<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function food()
    {
        return $this->belongsTo('App\Models\Food');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    use HasFactory;
}
