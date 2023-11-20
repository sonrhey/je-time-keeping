<?php

namespace App\Services;

class TokenService
{
  public static function generateToken($user)
  {
    return $user->createToken($user->id.'-'.$user->email)->plainTextToken;
  }
}
