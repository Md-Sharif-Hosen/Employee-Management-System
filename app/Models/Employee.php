<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function department_relation()
    {
        //function_body
        return $this->belongsTo(Department::class,'department_name');

    }
    public function user_role()
    {
        //function_body
        return $this->belongsTo(UserRole::class,'roles_name');
    }
}
