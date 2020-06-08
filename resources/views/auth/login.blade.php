@extends('auth.auth')

@section('content')
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>soSmart</h1>
      </div>
      <div class="login-box">


                <div class="card-body">
                    <form class = "login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        


                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                        <div class="form-group">
                            <label class="control-label">ENTER YOUR EMAIL</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" type="text" placeholder="Email" autofocus>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">PASSWORD</label>
                            <input  id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  type="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                <input type="checkbox"><span class="label-text">Stay Signed in</span>
                                </label>
                            </div>
                            <p class="semibold-text mb-2"><a href="{{ route('password.request') }}" data-toggle="flip">Forgot Password ?</a></p>
                            </div>
                        </div>
                        <div class="form-group btn-container">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                        </div>

                        

                       

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

