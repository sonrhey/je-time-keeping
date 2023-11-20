<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Messages\LoginMessages;
use App\RenderJSON\Response;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  private UserRepositoryInterface $userRepository;
  private RoleRepositoryInterface $roleRepository;
  private Response $response;
  public function __construct(
    UserRepositoryInterface $userRepository,
    RoleRepositoryInterface $roleRepository
    )
  {
    $this->userRepository = $userRepository;
    $this->roleRepository = $roleRepository;
    $this->response = new Response();
  }
  public function login(LoginRequest $request)
  {
    $roleId = $this->roleRepository->findById($request->type);
    $findUserByEmailAndRole = $this->userRepository->findUserByEmailAndRoleId($roleId, $request->email);
    if ($findUserByEmailAndRole) {
      $credentials = request([
        "email",
        "password"
      ]);
      if (Auth::attempt($credentials)) {
        $user = $findUserByEmailAndRole;
        $token = TokenService::generateToken($user);
        $user["token"] = $token;
        return $this->response->renderJSON(true, $user);
      }
      return $this->response->renderJSON(false, LoginMessages::UNAUTHORIZED);
    }
    return $this->response->renderJSON(false, LoginMessages::UNAUTHORIZED);
  }
}
