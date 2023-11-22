<?php

namespace App\Http\Controllers\Api\Admin;

use App\Constants\ReportType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\Messages\ReportingMessages;
use App\RenderJSON\Response;
use App\Repositories\ManagerTeacherRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use stdClass;

class ReportsController extends Controller
{
  private TimeRecordRepositoryInterface $timeRecordRepository;
  private ManagerRepositoryInterface $managerRepository;
  private ManagerTeacherRepository $managerTeacherRepository;
  private Response $response;
  public function __construct(
    TimeRecordRepositoryInterface $timeRecordRepository,
    ManagerRepositoryInterface $managerRepository,
    ManagerTeacherRepository $managerTeacherRepository
  )
  {
    $this->timeRecordRepository = $timeRecordRepository;
    $this->managerRepository = $managerRepository;
    $this->managerTeacherRepository = $managerTeacherRepository;
    $this->response = new Response();
  }
  public function reports(ReportRequest $request)
  {
    try {
      $reportType = $request->type;
      $managerId = $this->managerRepository->findAuthenticatedManager();
      $managersTeachers = $this->managerTeacherRepository->getTeachersByManagerId($managerId);
      $timeRecords = [];
      switch ($reportType) {
        case ReportType::DAILY:
          $dateToday = Carbon::now();
          $carbonPeriod = CarbonPeriod::create($dateToday, $dateToday);
          foreach ($carbonPeriod as $date) {
            foreach ($managersTeachers as $managersTeacher) {
              $formattedDate = $date->format("Y-m-d");
              $reportsObject = new stdClass();
              $reportsObject->teacher = "{$managersTeacher->teacher->first_name} {$managersTeacher->teacher->last_name}";
              $reportsObject->team = $managersTeacher->manager->first_name;
              $reportsObject->status = $this->timeRecordRepository->checkTimeRecordCustom($managersTeacher->teacher->id, $date);
              $reportsObject->date_time_in = $this->timeRecordRepository->getTimeLoggedInCustom($managersTeacher->teacher->id, $formattedDate)->time_logged_in ?? '';
              $reportsObject->date = $formattedDate;
              $timeRecords[] = $reportsObject;
            }
          }
          break;
        case ReportType::WEEKLY:
          $now = Carbon::now();
          $weekStartDate = $now->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:i');
          $weekEndDate = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d H:i');
          $carbonPeriod = CarbonPeriod::create($weekStartDate, $weekEndDate);
          foreach ($carbonPeriod as $date) {
            foreach ($managersTeachers as $managersTeacher) {
              $formattedDate = $date->format("Y-m-d");
              $reportsObject = new stdClass();
              $reportsObject->teacher = "{$managersTeacher->teacher->first_name} {$managersTeacher->teacher->last_name}";
              $reportsObject->team = $managersTeacher->manager->first_name;
              $reportsObject->status = $this->timeRecordRepository->checkTimeRecordCustom($managersTeacher->teacher->id, $date);
              $reportsObject->date_time_in = $this->timeRecordRepository->getTimeLoggedInCustom($managersTeacher->teacher->id, $formattedDate)->time_logged_in ?? '';
              $reportsObject->date = $formattedDate;
              $timeRecords[] = $reportsObject;
            }
          }
          break;
        case ReportType::MONTHLY:
            $now = Carbon::now();
            $weekStartDate = $now->startOfMonth()->format('Y-m-d H:i');
            $weekEndDate = $now->endOfMonth()->format('Y-m-d H:i');
            CarbonPeriod::macro('weekDaysOnly', function () {
              return $this->filter('isWeekday');
            });
            $carbonPeriod = CarbonPeriod::create($weekStartDate, $weekEndDate)->weekDaysOnly();
            foreach ($carbonPeriod as $date) {
              foreach ($managersTeachers as $managersTeacher) {
                $formattedDate = $date->format("Y-m-d");
                $reportsObject = new stdClass();
                $reportsObject->teacher = "{$managersTeacher->teacher->first_name} {$managersTeacher->teacher->last_name}";
                $reportsObject->team = $managersTeacher->manager->first_name;
                $reportsObject->status = $this->timeRecordRepository->checkTimeRecordCustom($managersTeacher->teacher->id, $date);
                $reportsObject->date_time_in = $this->timeRecordRepository->getTimeLoggedInCustom($managersTeacher->teacher->id, $formattedDate)->time_logged_in ?? '';
                $reportsObject->date = $formattedDate;
                $timeRecords[] = $reportsObject;
              }
            }
          break;
        case ReportType::CUSTOM:
            $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
            CarbonPeriod::macro('weekDaysOnly', function () {
              return $this->filter('isWeekday');
            });
            $carbonPeriod = CarbonPeriod::create($startDate, $endDate)->weekDaysOnly();
            foreach ($carbonPeriod as $date) {
              foreach ($managersTeachers as $managersTeacher) {
                $formattedDate = $date->format("Y-m-d");
                $reportsObject = new stdClass();
                $reportsObject->teacher = "{$managersTeacher->teacher->first_name} {$managersTeacher->teacher->last_name}";
                $reportsObject->team = $managersTeacher->manager->first_name;
                $reportsObject->status = $this->timeRecordRepository->checkTimeRecordCustom($managersTeacher->teacher->id, $date);
                $reportsObject->date_time_in = $this->timeRecordRepository->getTimeLoggedInCustom($managersTeacher->teacher->id, $formattedDate)->time_logged_in ?? '';
                $reportsObject->date = $formattedDate;
                $timeRecords[] = $reportsObject;
              }
            }
          break;
      }
      return $this->response->renderJSON(true, $timeRecords);
    } catch (Exception $e) {
      return $this->response->renderJSON(false, $e->getMessage());
    }
  }
}
