<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\ManagerTeacherRepositoryInterface;
use App\RenderJSON\Response;
use Illuminate\Http\Request;
use stdClass;

class TeachersController extends Controller
{
  private ManagerRepositoryInterface $managerRepository;
  private ManagerTeacherRepositoryInterface $managerTeacherRepository;
  private Response $response;
  public function __construct(
    ManagerRepositoryInterface $managerRepository,
    ManagerTeacherRepositoryInterface $managerTeacherRepository
  )
  {
    $this->managerRepository = $managerRepository;
    $this->managerTeacherRepository = $managerTeacherRepository;
    $this->response = new Response();
  }
  public function getMyTeachers()
  {
    $managerId = $this->managerRepository->findAuthenticatedManager();
    $managersTeachers = $this->managerTeacherRepository->getTeachersByManagerId($managerId);
    $teachers = [];
    foreach ($managersTeachers as $managersTeacher) {
      $teacherObject = new stdClass();
      $teacherObject->team = $managersTeacher->manager->first_name;
      $teacherObject->teacher = "{$managersTeacher->teacher->first_name} {$managersTeacher->teacher->last_name}";
      $teacherObject->email = $managersTeacher->teacher->user->email;
      $teacherObject->mobile_number = $managersTeacher->teacher->mobile_number;
      $teachers[] = $teacherObject;
    }
    return $this->response->renderJSON(true, $teachers);
  }
}
