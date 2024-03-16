<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7a6bd97ece.js" crossorigin="anonymous"></script>
  </head>
  <body style="background-color: #505050;">
    <section>
        <div class="container mt-5 pt-5">
            <div class="text-center">
                <h4 style="color: white;">SISTEM PEMINJAMAN INVENTARIS</h4>
                <h1 style="color: #FFE61A;"><b>DESAIN KOMUNIKASI VISUAL</b></h1>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card p-3 shadow">
                        <div class="card-body">
                          <h2 class="text-center">Login Admin</h2>
                          @if (Session::has('statusFailAdmin'))
                            <div class="alert alert-danger">
                                {{ Session::get('message') }}
                            </div>
                          @endif
                          <form action="/prosesLoginAdmin" method="post">
                            @csrf
                            <input type="text" class="form-control my-3 py-2" placeholder="Email" name="email" style="background-color: #E2E2E2;" required>
                            <input required type="password" class="form-control my-3 py-2" placeholder="Password" name="password" style="background-color: #E2E2E2;">
                            <div class="text-center">
                              <button type="submit" class="btn btn-danger w-50">Login</button>
                            </div>
                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>