<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
  public function findById($name)
  {
    return Role::findRole($name)->first()->id;
  }
  public function findByName($name)
  {
    return Role::where('name', $name)->first()->name;
  }
}
