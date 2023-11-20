<?php

namespace App\Http\Controllers\Api\Admin;

use App\Constants\ReportType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\Messages\ReportingMessages;
use App\RenderJSON\Response;
use Exception;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
  private TimeRecordRepositoryInterface $timeRecordRepository;
  private ManagerRepositoryInterface $managerRepository;
  private Response $response;
  public function __construct(
    TimeRecordRepositoryInterface $timeRecordRepository,
    ManagerRepositoryInterface $managerRepository
  )
  {
    $this->timeRecordRepository = $timeRecordRepository;
    $this->managerRepository = $managerRepository;
    $this->response = new Response();
  }
  public function reports(ReportRequest $request)
  {
    try {
      $reportType = $request->type;
      $teacherId = $this->managerRepository->findAuthenticatedManager();
      switch ($reportType) {
        case ReportType::DAILY:
          $report = $this->timeRecordRepository->timeRecordDaily($teacherId);
          break;
        case ReportType::WEEKLY:
          $report = $this->timeRecordRepository->timeRecordWeekly($teacherId);
          break;
        case ReportType::MONTHLY:
          $report = $this->timeRecordRepository->timeRecordMonthly($teacherId);
          break;
        case ReportType::CUSTOM:
          $requestDate = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
          ];
          $report = $this->timeRecordRepository->timeRecordCustom($teacherId, $requestDate);
          break;
        default:
        return $this->response->renderJSON(false, ReportingMessages::REPORT_TYPE_NOT_FOUND);
      }
      return $this->response->renderJSON(true, $report);
    } catch (Exception $e) {
      return $this->response->renderJSON(false, $e->getMessage());
    }
  }
}
