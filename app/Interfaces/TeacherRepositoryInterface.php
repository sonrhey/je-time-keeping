<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface
{
  public function createTeacher(array $teacherDetails);
  public function findAuthenticatedTeacher();
}
