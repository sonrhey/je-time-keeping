<?php

namespace App\Interfaces;

interface ManagerRepositoryInterface
{
  public function createManager(array $managerDetails);
  public function findAuthenticatedManager();
  public function getManagers();
}
