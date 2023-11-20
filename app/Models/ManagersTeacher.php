<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagersTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
      'teacher_id',
      'manager_id'
    ];

    public function teacher()
    {
      return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function manager()
    {
      return $this->belongsTo(Manager::class,'manager_id');
    }

    public function scopeGetTeachersByManager($query, $managerId)
    {
      return $query->where('manager_id', $managerId);
    }
}
