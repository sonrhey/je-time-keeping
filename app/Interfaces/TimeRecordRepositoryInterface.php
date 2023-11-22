<?php

namespace App\Interfaces;

interface TimeRecordRepositoryInterface
{
  public function createTimeRecord(array $timeLogs);
  public function checkTimeRecord($teacherId);
  public function getTimeLoggedIn($teacherId);
  public function timeRecordDaily($teacherId);
  public function timeRecordWeekly($teacherId);
  public function timeRecordMonthly($teacherId);
  public function timeRecordCustom($teacherId, $requestDate);
  public function checkTimeRecordCustom($teacherId, $date);
  public function getTimeLoggedInCustom($teacherId, $date);
}
