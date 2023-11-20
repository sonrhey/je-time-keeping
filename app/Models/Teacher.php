<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'last_name',
      'first_name',
      'mobile_number',
    ];

    public function timeRecord()
    {
      return $this->hasMany(TimeRecord::class, 'teacher_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
