<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="/manifest.json" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    {{-- Manifest App --}}
    <link rel="manifest" href="/manifest.json">

    {{-- My CSS --}}
    <link rel="stylesheet" href="style.css">

    <title>{{ $title }} | To Do App</title>
  </head>
  <body>
    <nav class="navbar navbar-light shadow-sm d-flex justify-content-center" style="background-color: white">
      <div class="container">
        <a class="navbar-brand text-center" href="#">
          <img src="/img/task-list.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          My ToDo
        </a>
      </div>
    </nav>
      <div class="container mt-4">
        @yield('container')
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="serviceworker.js"></script>
    <script src="/sw-build.js"></script>
  </body>
</html>