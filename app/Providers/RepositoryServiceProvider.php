<?php

namespace App\Providers;

use App\Interfaces\ManagerRepositoryInterface;
use App\Interfaces\ManagerTeacherRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\ShiftRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use App\Interfaces\TeacherShiftRepositoryInterface;
use App\Interfaces\TimeRecordRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ManagerRepository;
use App\Repositories\ManagerTeacherRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ShiftRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\TeacherShiftRepository;
use App\Repositories\TimeRecordRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
      $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
      $this->app->bind(ManagerRepositoryInterface::class, ManagerRepository::class);
      $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
      $this->app->bind(TimeRecordRepositoryInterface::class, TimeRecordRepository::class);
      $this->app->bind(ShiftRepositoryInterface::class, ShiftRepository::class);
      $this->app->bind(ManagerTeacherRepositoryInterface::class, ManagerTeacherRepository::class);
      $this->app->bind(TeacherShiftRepositoryInterface::class, TeacherShiftRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
