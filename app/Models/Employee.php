<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'hiredate'
    ];
    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendanceable');
    }
    protected $casts = [
       
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
