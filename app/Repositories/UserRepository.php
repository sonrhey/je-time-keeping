<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function createUser($userDetails)
  {
    return User::create($userDetails);
  }
  public function findUserByEmail($email)
  {
    return User::where("email", $email)->first();
  }
  public function findUserByEmailAndRoleId($roleId, $email)
  {
    return User::with('manager', 'teacher', 'role')->where([
      "role_id" => $roleId,
      "email" => $email
    ])->first();
  }
}
