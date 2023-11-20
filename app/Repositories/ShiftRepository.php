<?php

namespace App\Repositories;
use App\Interfaces\ShiftRepositoryInterface;
use App\Models\Shift;

class ShiftRepository implements ShiftRepositoryInterface
{
  public function getShifts()
  {
    return Shift::all();
  }
}
