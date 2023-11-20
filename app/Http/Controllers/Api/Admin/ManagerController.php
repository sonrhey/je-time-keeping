<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ManagerRepositoryInterface;
use App\RenderJSON\Response;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
  private ManagerRepositoryInterface $managerRepository;
  private Response $response;
  public function __construct(ManagerRepositoryInterface $managerRepository)
  {
    $this->managerRepository = $managerRepository;
    $this->response = new Response();
  }
  public function index()
  {
    $managers = $this->managerRepository->getManagers();
    return $this->response->renderJSON(true, $managers);
  }
}
