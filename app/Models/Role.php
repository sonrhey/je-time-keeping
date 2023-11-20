<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function scopeTeacher($query)
    {
      return $query->where('name', 'Teacher');
    }

    public function scopeManager($query)
    {
      return $query->where('name','Manager');
    }

    public function scopeFindRole($query, $role) {
      return $query->where('name', $role);
    }
}
