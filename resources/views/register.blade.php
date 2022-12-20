<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Register</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        />
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"
        />
        <!-- icheck bootstrap -->
        <link
            rel="stylesheet"
            href="{{
                asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')
            }}"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('register40') }}"><b>Register</b>Page</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Create your account</p>
                    @if($errors->has('error'))
                    <div class="text-danger text-center mb-3">
                        {{ $errors->first('error') }}
                    </div>
                    @endif

                    <form action="{{ route('register40') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Full Name"
                                    value="{{ old('name') }}"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Password"
                                    value="{{ old('password') }}"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Password Confirmation"
                                    value="{{ old('password_confirmation') }}"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            @if($errors->has('password_confirmation'))
                            <div class="text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                            @endif
                        </div>

                        <div class="row">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                    </div>
                    <p class="mb-0 text-center">
                        <a href="{{ route('login40') }}" class="text-center"
                            >Login to your existing account</a
                        >
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{
                asset('plugins/bootstrap/js/bootstrap.bundle.min.js')
            }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
    </body>
</html>
