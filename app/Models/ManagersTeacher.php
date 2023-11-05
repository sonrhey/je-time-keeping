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
}