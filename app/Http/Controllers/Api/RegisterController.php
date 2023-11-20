<?php

namespace App\Http\Controllers\Api;

use App\Constants\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\ManagerTeacherRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use App\Interfaces\TeacherShiftRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Messages\RegistrationMessages;
use App\Models\Role;
use App\RenderJSON\Response;
use App\Services\TokenService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  private UserRepositoryInterface $userRepository;
  private RoleRepositoryInterface $roleRepository;
  private TeacherRepositoryInterface $teacherRepository;
  private ManagerRepositoryInterface $managerRepository;
  private ManagerTeacherRepositoryInterface $managerTeacherRepository;
  private TeacherShiftRepositoryInterface $teacherShiftRepository;
  private TokenService $tokenService;
  private Response $response;
  public function __construct(
    UserRepositoryInterface $userRepository,
    RoleRepositoryInterface $roleRepository,
    TeacherRepositoryInterface $teacherRepository,
    ManagerRepositoryInterface $managerRepository,
    ManagerTeacherRepositoryInterface $managerTeacherRepository,
    TeacherShiftRepositoryInterface $teacherShiftRepository,
  )
  {
    $this->userRepository = $userRepository;
    $this->roleRepository = $roleRepository;
    $this->teacherRepository = $teacherRepository;
    $this->managerRepository = $managerRepository;
    $this->managerTeacherRepository = $managerTeacherRepository;
    $this->teacherShiftRepository = $teacherShiftRepository;
    $this->tokenService = new TokenService();
    $this->response = new Response();
  }

  public function register(UserRequest $request)
  {
    try {
      DB::beginTransaction();
      $userDetails = $request->all();
      $userDetails['role_id'] = $this->roleRepository->findById($request->type);
      $user = $this->userRepository->createUser($userDetails);
      $userDetails['user_id'] = $user->id;

      switch ($request->type) {
        case Roles::TEACHER:
          $teacher = $this->teacherRepository->createTeacher($userDetails);
          $this->managerTeacherRepository->createManagerTeacher($teacher->id, $request->manager_id);
          $this->teacherShiftRepository->createTeacherShift($request->shift_id, $teacher->id);
        break;
        case Roles::MANAGER:
          $this->managerRepository->createManager($userDetails);
        break;
      }

      $user['token'] = $this->tokenService->generateToken($user);
      DB::commit();
      return $this->response->renderJSON(true, RegistrationMessages::REGISTRATION_SUCCESS);
    } catch (\Exception $e) {
      DB::rollBack();
      return $this->response->renderJSON(false, $e->getMessage());
    }
  }
}
