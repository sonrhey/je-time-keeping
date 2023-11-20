<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Interfaces\TeacherRepositoryInterface;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Messages\TimeMessages;
use App\RenderJSON\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeInController extends Controller
{
  private TeacherRepositoryInterface $teacherRepository;
  private TimeRecordRepositoryInterface $timeRecordRepository;
  private Response $response;
  public function __construct(
    TeacherRepositoryInterface $teacherRepository,
    TimeRecordRepositoryInterface $timeRecordRepository,
    )
  {
    $this->teacherRepository = $teacherRepository;
    $this->timeRecordRepository = $timeRecordRepository;
    $this->response = new Response();
  }
  public function timeIn()
  {
    $timeLoggedIn = Carbon::now();
    $teacherId = $this->teacherRepository->findAuthenticatedTeacher();
    $timeLog = [
      'time_logged_in' => $timeLoggedIn,
      'teacher_id' => $teacherId,
    ];
    $this->timeRecordRepository->createTimeRecord($timeLog);
    return $this->response->renderJSON(true, TimeMessages::TIME_IN_SUCCESS);
  }

  public function checkTimeIn()
  {
    $teacherId = $this->teacherRepository->findAuthenticatedTeacher();
    $timeRecords = $this->timeRecordRepository->checkTimeRecord($teacherId);

    return $this->response->renderJSON(true, [
      'time_in' => $timeRecords
    ]);
  }
}
