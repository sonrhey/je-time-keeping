<?php

namespace App\Http\Controllers\Navigations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
  public function index()
  {
    return redirect("/login");
  }
  public function timeIn()
  {
    return view("welcome");
  }
  public function login()
  {
    return view("authentication.login");
  }
  public function adminLogin()
  {
    return view("authentication.admin.login");
  }
  public function adminDashboard()
  {
    return view("admin.pages.dashboard.index");
  }
  public function reports()
  {
    return view("admin.pages.reports.index");
  }
  public function users()
  {
    return view("admin.pages.teachers.index");
  }
}
