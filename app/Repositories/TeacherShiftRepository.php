<?php

namespace App\Repositories;
use App\Interfaces\TeacherShiftRepositoryInterface;
use App\Models\TeacherShift;

class TeacherShiftRepository implements TeacherShiftRepositoryInterface
{
  public function createTeacherShift($shiftId, $teacherId)
  {
    $teacherShift = new TeacherShift();
    $teacherShift->teacher_id = $teacherId;
    $teacherShift->shift_id = $shiftId;
    $teacherShift->save();

    return $teacherShift;
  }
}
