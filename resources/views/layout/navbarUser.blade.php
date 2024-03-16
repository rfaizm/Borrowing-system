<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="@yield('cssTambahan')">
    <script src="https://kit.fontawesome.com/7a6bd97ece.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color : #990000;">
      <div class="container-fluid">
        <a class="navbar-brand fw-bolder fs-2" href="/user" style="margin-left: 2%;">
          <span style="color: white;" >SIMAVI |</span> <span style="color: #FFE61A;" >DKV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color:white;">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-2">
              <a class="nav-link active fw-semibold" aria-current="page" href="/user2" style="color:white;">Peminjaman</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active fw-semibold" aria-current="page" href="/user3" style="color:white;">Riwayat Peminjaman</a>
            </li>
            <li class="nav-item mx-2 ">
              {{-- <a class="nav-link active fw-semibold" aria-current="page" href="/user4" style="color:white;">
                <i class="fa-sharp fa-solid fa-circle-user fa-2x"></i>
              </a> --}}
              <div class="dropdown me-5">
                <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-sharp fa-solid text-white fa-circle-user fa-2x"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">Profile</a></li>
                  <li><a class="dropdown-item" href="/logoutSiswa">Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->

    @yield('content')

    <!-- FOOTER -->
    <!-- <div class="text-center py-2" style="background-color: #505050;" >
      <div class=" fw-bolder fs-2 ">
        <span style="color: white;" >SIMAVI |</span> <span style="color: #FFE61A;" >DKV</span>
      </div>
      <div class="my-2">
        <p style="color:white;">Copyright 2023 All rights reserved | DKV SMKN 3 Bandung</p>
      </div>
    </div> -->
    <!-- END FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>