<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    @vite([
      'resources/css/app.css',
      'resources/css/authentication/index.css',
      'resources/js/app.js',
    ])
  </head>
  <body>
    <div class="d-flex justify-content-center align-items-center h-100">
      @yield('content')
    </div>
  </body>
</html>
