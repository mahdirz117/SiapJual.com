<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <div class="row justify-content-center" style="margin-top: 150px">
        <div class="col-lg-6">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Login Page</h1>
                <form action="/authenticate" method="post" class="user">
                    @csrf
                    <div class="form-group mt-3">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan email anda" value="{{ old('email') }}">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}">
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{session('error')}}!
                    </div>
                    @endif
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="w-100 btn btn-lg btn-danger mt-3">Login</button>
                        <small class="d-block mt-3">Doesn't have Account? <a class="text-danger" href="/auth/register">Register
                        Here</a></small>
                    </div>
                </form>
        </div>
    </div>
    </div>

    <body>

    </body>

</html>