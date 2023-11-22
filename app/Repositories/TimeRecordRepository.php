<?php

namespace App\Repositories;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\Models\TimeRecord;

class TimeRecordRepository implements TimeRecordRepositoryInterface
{
  public function createTimeRecord($timeLogs)
  {
    return TimeRecord::create($timeLogs);
  }
  public function checkTimeRecord($teacherId)
  {
    $timeRecord = TimeRecord::findRecordByTeacherId($teacherId)
                            ->findLoggedInToday()
                            ->first();
    $isTimeIn = !empty($timeRecord);

    return $isTimeIn;
  }
  public function getTimeLoggedIn($teacherId)
  {
    return TimeRecord::getTimeLoggedInToday($teacherId)->first();
  }
  public function timeRecordDaily($teacherId)
  {
    return TimeRecord::getTimeRecordDaily($teacherId)->get();
  }
  public function timeRecordWeekly($teacherId)
  {
    return TimeRecord::getTimeRecordWeekly($teacherId)->get();
  }
  public function timeRecordMonthly($teacherId)
  {
    return TimeRecord::getTimeRecordMonthly($teacherId)->get();
  }
  public function timeRecordCustom($teacherId, $requestDate)
  {
    return TimeRecord::getTimeRecordCustom($teacherId, $requestDate)->get();
  }
  public function checkTimeRecordCustom($teacherId, $date)
  {
    $timeRecord = TimeRecord::findRecordByTeacherIdAndDate($teacherId, $date)
                            ->first();
    $isTimeIn = !empty($timeRecord);
    return $isTimeIn;
  }
  public function getTimeLoggedInCustom($teacherId, $date)
  {
    $timeRecord = TimeRecord::findRecordByTeacherIdAndDate($teacherId, $date)
    ->first();
    return $timeRecord;
  }
}
