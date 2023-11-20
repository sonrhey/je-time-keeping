<?php

namespace App\Repositories;
use App\Interfaces\ManagerRepositoryInterface;
use App\Models\Manager;
use Exception;
use Illuminate\Support\Facades\Auth;

class ManagerRepository implements ManagerRepositoryInterface
{
  public function createManager($managerDetails)
  {
    return Manager::create($managerDetails);
  }
  public function findAuthenticatedManager()
  {
    return Auth::user()->manager->id ?? throw new Exception("Unauthorized");
  }
  public function getManagers()
  {
    return Manager::all();
  }
}
