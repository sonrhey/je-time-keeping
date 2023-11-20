<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
  public function findById($name);
  public function findByName($name);
}
