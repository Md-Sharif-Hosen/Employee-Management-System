<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    public function driver_info()
    {
        //function_body
        return $this->belongsTo(Driver::class,'driver_id');
    }
}
