<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7a6bd97ece.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color : #990000;">
      <div class="container-fluid">
        <a class="navbar-brand fw-bolder" href="" style="margin-left: 2%;">
          <span style="color: white; font-size: 28px;" >SIMAVI |</span> <span style="color: #FFE61A; font-size: 28px;" >DKV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color:white;">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 2%;">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-2">
              <a class="nav-link active fw-semibold" aria-current="page" href="/toLoginAdmin" style="color:white;">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- CONTENT -->
    <!-- JUMBOTRON -->
    <div class="banner" style="background: url(img/SMK.png); background-size: cover; padding-top: 8%; padding-bottom: 8%;">
    
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-sm-12 col-md-8 text-center text-md-start my-auto">
            <h4 style="color: #ffffff;">Selamat Datang di Sistem Peminjaman Inventaris</h4>
            <h1 style="color: #FFE61A;"><b>DESAIN KOMUNIKASI VISUAL</b></h1>
            <h1 style="color: #FFE61A;"><b>SMKN 3 BANDUNG</b></h1>
          </div>
          <div class="col-sm-12 col-md-4">
            <section>
                <div class="row">
                  <div class="col-12">
                    <div class="card p-3">
                      <div class="card-body">
                        <h2 class="text-center">Login Siswa</h2>
                        @if (Session::has('statusFailSiswa'))
                          <div class="alert alert-danger">
                              {{ Session::get('message') }}
                          </div>
                        @endif
                        <form action="/prosesLoginSiswa" method="post">
                          @csrf
                          <input type="text" name="email" class="form-control my-3 py-2" placeholder="Username" style="background-color: #E2E2E2;">
                          <input type="password" name="password" class="form-control my-3 py-2" placeholder="Password" style="background-color: #E2E2E2;">
                          <div class="text-center">
                            <button type="submit" class="btn btn-danger w-50">Login</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <!-- END JUMBTRON -->
    <section id="alur">
      <div class="container" style="padding:5%">
        <div class="row text-center">
          <div class="col">
            <h2 class="fw-bold">Alur Peminjaman</h2>
          </div>
        </div>
        <img src="img/SI-Peminjaman.png" alt="" style="width: 100%; padding-top: 4%;">
      </div>
    </section>
    <!-- END CONTENT -->
    
    <!-- FOOTER -->
    <div class="text-center py-2" style="background-color: #505050;">
      <div class=" fw-bolder fs-2 ">
        <span style="color: white;" >SIMAVI |</span> <span style="color: #FFE61A;" >DKV</span>
      </div>
      <div class="my-2">
        <p style="color:white;">Copyright ©2023 All rights reserved | SMKN 3 Bandung</p>
      </div>
    </div>
    <!-- END FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>