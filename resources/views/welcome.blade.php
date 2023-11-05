<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @vite([
      'resources/css/app.css',
      'resources/css/time-in/index.css',
      'resources/js/app.js',
      'resources/js/time-in/index.js'
      ])
  </head>
  <body>
    <div class="d-flex justify-content-center align-items-center h-100">
      <div>
        <h1 class="display-2">Welcome <span class="fw-bold">Teacher Joy!</span></h1>
        <hr>
        <div class="text-center">
          <h1 class="display-5">
            {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
          </h1>
          <h1 class="display-5 current-time">

          </h1>
          <div class="d-grid mt-4">
            <button type="button" class="btn btn-danger rounded-pill p-3 fs-3">TIME IN</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
