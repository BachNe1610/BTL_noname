<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'position',
        'department',
        'hire_date',
        'salary',
    ];

    protected $keyType = 'string';  

  
    public $incrementing = false;  

    protected static function booted()
    {
        static::creating(function ($employee) {
            $employee->id = (string) Str::uuid(); 
        });
    }

    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function getPositionAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

    public function getDepartmentAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }


}


