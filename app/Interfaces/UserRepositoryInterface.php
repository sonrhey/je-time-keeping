<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
  public function createUser(array $userDetails);
  public function findUserByEmail($email);
  public function findUserByEmailAndRoleId($roleId, $email);
}
