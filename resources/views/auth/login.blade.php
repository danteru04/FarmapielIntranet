<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Inicia Sesión en la intranet de Farmapiel">
    <meta name="author" content="Dante Isaac Reyes Ugalde">

    <link href="/sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Home2.css">
    
    <title>@yield("Title", "Inicio de Sesión")</title>
</head>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row align-items-center ">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image text-center">
                                <img src="/img/Imagenes Farmapiel/Farmapiel Imagen Azul con blanco Cuadrada.png" alt="Logo Intranet"
                                class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido de Vuelta!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" id="email" class="form-control form-control-user @error('email') is-danger @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="Correo electrónico" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                             placeholder="Contraseña" required autocomplete="current-password">
                                             @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Iniciar Sesión
                                        </button>
                                        <hr>
                                        <a href="{{route('loginGoogle')}}" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sb-admin-2/js/sb-admin-2.min.js"></script>

</body>

</html>