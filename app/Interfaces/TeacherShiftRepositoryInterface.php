<?php

namespace App\Interfaces;

interface TeacherShiftRepositoryInterface
{
  public function createTeacherShift($shiftId, $teacherId);
}
