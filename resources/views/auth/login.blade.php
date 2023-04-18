@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection
@section('content')

    <div class="card box">
        <span class ="borderLine"></span>

        <div class="card-body">
            <form id="myForm1" method="POST" action="{{ route('login') }}">
                <h4>Admin Login</h4>
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group inputBox">
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Please Enter Email"
                           tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <span>Email</span>
                    <i></i>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group inputBox">
<!--                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>-->
                    <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Please Enter Password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"

                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <span>Password</span>
                    <i></i>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
                <br>

                <div class="form-group links">
                    <a href="{{ route('password.request') }}" class="text-small">
                        Forgot Password?
                    </a>

                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>

                </div>


                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
            $("#myForm1").on("submit", function () {
                $("#pageloader1").fadeIn();
        });
    </script>
@endsection
