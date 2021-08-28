<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'day',
        'working_hours',
        'attendanceable_id',
        'attendanceable_type',
        'status_id'

    ];
    public function attendanceable()
    {
        return $this->morphTo();
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
  /**   public function setstatus_idAttribute($value)
    *{
    *    if ($value=="Present") {
       *     $this->attributes['status_id'] = 2; }
       * if ($value=="Absent") {
      *      $this->attributes['status_id'] = 1;  }
      *  if ($value=="Sick Leave") {
      *      $this->attributes['status_id'] = 3; }
      *  if ($value=="Day OFF") {
     *       $this->attributes['status_id'] = 4; }}*/
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
