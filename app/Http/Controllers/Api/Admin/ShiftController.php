<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ShiftRepositoryInterface;
use App\RenderJSON\Response;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
  private ShiftRepositoryInterface $shiftRepository;
  private Response $response;
  public function __construct(ShiftRepositoryInterface $shiftRepository)
  {
    $this->shiftRepository = $shiftRepository;
    $this->response = new Response();
  }
  public function index()
  {
    $shifts = $this->shiftRepository->getShifts();
    return $this->response->renderJSON(true, $shifts);
  }
}
