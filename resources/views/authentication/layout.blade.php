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
      'resources/css/authentication/index.css',
      'resources/js/app.js',
      'resources/js/authentication/index.js',
    ])
  </head>
  <body>
    <div class="container h-100">
      <div class="h-100">
        @yield('content')
      </div>
    </div>
  @yield('custom-js')
  </body>
</html>
