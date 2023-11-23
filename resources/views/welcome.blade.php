<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JE Time Keeping</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    @vite([
      'resources/css/app.css',
      'resources/css/time-in/index.css',
      'resources/js/app.js',
      'resources/js/teacher/pages/time-in/index.js'
      ])
  </head>
  <body>
    <div class="container h-100">
      <div class="d-table w-100 h-100">
        <div class="d-table-cell align-middle">
          <div class="w-adjust m-auto">
            <div class="p-4 color-83A2FF rounded-4">
              <div class="w-75 m-auto text-center">
                <label class="fs-1">Welcome <span class="fw-bold">Teacher <span class="teacher-name"></span>!</span></label>
                <hr>
                <div class="text-center">
                  <h1 class="fs-3">
                    {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
                  </h1>
                  <h1 class="fs-3 current-time">

                  </h1>
                  <div class="d-grid mt-4">
                    <button type="button" class="btn btn-warning rounded p-2 fs-2" id="time-in">Time In</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @vite('resources/js/teacher/pages/time-in/index.js');
  </body>
</html>
