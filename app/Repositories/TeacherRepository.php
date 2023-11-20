<?php

namespace App\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherRepository implements TeacherRepositoryInterface
{
  public function createTeacher($teacherDetails)
  {
    return Teacher::create($teacherDetails);
  }
  public function findAuthenticatedTeacher()
  {
    return Auth::user()->teacher->id;
  }
}
