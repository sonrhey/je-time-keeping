<?php

namespace App\Interfaces;

interface ManagerTeacherRepositoryInterface
{
  public function createManagerTeacher($teacherId, $managerId);
  public function getTeachersByManagerId($managerId);
}
