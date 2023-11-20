<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    @vite([
      'resources/css/app.css',
      'resources/css/admin/dashboard.css',
      'resources/js/app.js',
      'resources/js/admin/index.js',
    ])
    @yield('custom-css')
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/admin/dashboard">
          <img src="{{ asset('images/logo.png') }}" width="50" height="50"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-center" id="navbarColor01">
          <ul class="navbar-nav gap-3">
            <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() === "dashboard" ? "active bg-dark rounded" : "" }}" href="/admin/dashboard">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() === "reports" ? "active bg-dark rounded" : "" }}" href="/admin/reports">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() === "users" ? "active bg-dark rounded" : "" }}" href="/admin/users">My Teachers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="label h5 justify-content-between w-100 bg-light d-flex gap-2 p-3">
      <div>
        <p class="mb-0">
          Hi, OM <span class="om-name fw-bold"></span>!
        </p>
      </div>
      <div>
        <p class="mb-0">
          {{ \Carbon\Carbon::now()->toFormattedDayDateString() }}
          |
          <span class="mb-0 current-time"></span>
        </p>
      </div>
    </div>
    <div class="container h-100">
      <div class="h-100">
        <div class="mt-4"></div>
        @yield('content')
      </div>
    </div>
  <script src="https://kit.fontawesome.com/36dee43059.js" crossorigin="anonymous"></script>
  @yield('custom-script')
  </body>
</html>
