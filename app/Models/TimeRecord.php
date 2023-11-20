<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
      'teacher_id',
      'time_logged_in'
    ];

    public function scopeFindRecordByTeacherId($query, $teacherId)
    {
      return $query->where('teacher_id', $teacherId);
    }

    public function scopeFindLoggedInToday($query)
    {
      $dateTimeToday = Carbon::now()->toDateString();
      return $query->where('time_logged_in', '>=', $dateTimeToday);
    }

    public function scopeGetTimeLoggedInToday($query, $teacherId)
    {
      $dateTimeToday = Carbon::now()->toDateString();
      return $query->where('teacher_id', $teacherId)
                   ->where('time_logged_in', '>=', $dateTimeToday);
    }

    public function scopeGetTimeRecordDaily($query, $teacherId)
    {
      return $query->where('teacher_id', $teacherId)
                   ->where('time_logged_in', '>=', Carbon::now()->toDateString());
    }

    public function scopeGetTimeRecordWeekly($query, $teacherId)
    {
      $now = Carbon::now();
      $weekStartDate = $now->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:i');
      $weekEndDate = $now->endOfWeek(Carbon::FRIDAY)->format('Y-m-d H:i');
      return $query->where('teacher_id', $teacherId)
                   ->where('time_logged_in', '>=', $weekStartDate)
                   ->where('time_logged_in', '<=', $weekEndDate);
    }

    public function scopeGetTimeRecordMonthly($query, $teacherId)
    {
      $now = Carbon::now();
      $monthStartDate = $now->startOfMonth()->format('Y-m-d H:i');
      $monthEndDate = $now->endOfMonth()->format('Y-m-d H:i');
      return $query->where('teacher_id', $teacherId)
                   ->where('time_logged_in', '>=', $monthStartDate)
                   ->where('time_logged_in', '<=', $monthEndDate);
    }

    public function scopeGetTimeRecordCustom($query, $teacherId, $requestDate)
    {
      $startDate = Carbon::createFromFormat('Y-m-d', $requestDate['start_date']);
      $endDate = Carbon::createFromFormat('Y-m-d', $requestDate['end_date']);
      return $query->where('teacher_id', $teacherId)
                   ->where('time_logged_in', '>=', $startDate)
                   ->where('time_logged_in', '<=', $endDate);
    }
}
