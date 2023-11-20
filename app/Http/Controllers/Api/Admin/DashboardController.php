<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\ManagerTeacherRepositoryInterface;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\RenderJSON\Response;
use Illuminate\Http\Request;
use stdClass;

class DashboardController extends Controller
{
  private TimeRecordRepositoryInterface $timeRecordRepository;
  private ManagerTeacherRepositoryInterface $managerTeacherRepository;
  private ManagerRepositoryInterface $managerRepository;
  private Response $response;
  public function __construct(
    TimeRecordRepositoryInterface $timeRecordRepository,
    ManagerTeacherRepositoryInterface $managerTeacherRepository,
    ManagerRepositoryInterface $managerRepository,
  )
  {
    $this->timeRecordRepository = $timeRecordRepository;
    $this->managerTeacherRepository = $managerTeacherRepository;
    $this->managerRepository = $managerRepository;
    $this->response = new Response();
  }
  public function teachersLoggedInToday()
  {
    try {
      $managerId = $this->managerRepository->findAuthenticatedManager();
      $managersTeachers = $this->managerTeacherRepository->getTeachersByManagerId($managerId);
      $newArray = [];
      foreach ($managersTeachers as $managersTeacher) {
        $newObject = new stdClass();
        $newObject->id = $managersTeacher->id;
        $newObject->teacher = $managersTeacher->teacher->first_name.' '.$managersTeacher->teacher->last_name;
        $newObject->team = $managersTeacher->manager->first_name;
        $newObject->status = $this->timeRecordRepository->checkTimeRecord($managersTeacher->teacher->id);
        $newObject->time_in = $this->timeRecordRepository->getTimeLoggedIn($managersTeacher->teacher->id)->time_logged_in ?? '';
        $newArray[] = $newObject;
      }
      return $this->response->renderJSON(true, $newArray);
    } catch (\Exception $e) {
      return $this->response->renderJSON(false, $e->getMessage());
    }
  }
}
