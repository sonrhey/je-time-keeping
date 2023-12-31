<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherShift extends Model
{
    use HasFactory;

    protected $fillable = [
      'teacher_id',
      'shift_id'
    ];
}
