<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
  
    public function Employee_name()
    {
        //function_body
        return $this->belongsTo(Employee::class,'employee_name');
    }
    public function department_name()
    {
        //function_body
        return $this->belongsTo(Department::class,'department');
    }
public function post_name()
{
    //function_body
    return $this->belongsTo(Employee::class,'post');
}

}
