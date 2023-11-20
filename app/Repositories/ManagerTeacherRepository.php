<?php

namespace App\Repositories;
use App\Interfaces\ManagerTeacherRepositoryInterface;
use App\Models\ManagersTeacher;

class ManagerTeacherRepository implements ManagerTeacherRepositoryInterface
{
  public function createManagerTeacher($teacherId, $managerId)
  {
    $managerTeacher = new ManagersTeacher();
    $managerTeacher->teacher_id = $teacherId;
    $managerTeacher->manager_id = $managerId;
    $managerTeacher->save();
    return $managerTeacher;
  }
  public function getTeachersByManagerId($managerId)
  {
    return ManagersTeacher::getTeachersByManager($managerId)->get();
  }
}
