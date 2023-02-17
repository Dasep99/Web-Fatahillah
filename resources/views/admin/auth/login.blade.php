<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<section class="container">
    <div class="row content d-flex justify-content-center">
        <div class="col-md-5">
            <div class="box shadow bg-white p-4">
                <h3 class="mb-4 text-center fs-1">Login SisFo</h3>

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="POST" class="mb-4">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0" id="
                    floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-0" id="
                    floatingPassword" placeholder="name@example.com" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>


                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-info btn-lg">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
