@extends('layouts.home')

@section('content')
<body class = "bg-image"> 
  <div class="container">
  <div class="row vh-100 d-flex justify-content-center align-items-center">
    <div class= "col-md-8 col-lg-12">
      <div class="card o-hidden border-0 shadow-lg">
        <div class="git row g-0">
          <div class="col-lg-7" >
            <a href="/" class="">
              <img src="images/dokter.jpg" class="img-fluid" >
            </a>
          </div>
          <div class="col-lg-5">
              <div class="card-body">
                <h3 class="card-title text-center mb-4">Welcome!</h3>
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>          
                @endif
                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="mb-3">
                    <input type="email" id="email" placeholder="Enter Your Email Address" class="form-control form-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="text-small text-danger text-center" role="alert">
                      <small>{{ $message }}</small>
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <input type="password" id="password" placeholder="Password" class="form-control form-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <div class="text-small text-danger text-center" role="alert">
                        <small>{{ $message }}</small>
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                  <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                  </div>
                  <hr>
                  <div class="row">                    
                    <div class="col text-center">
                      <a class="btn btn-link" href="/resetpass">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    </div>
                  </div>
                  <p class="text-center"><small>Don't have account? <a href="{{ route('register') }}" >Create an Account!!!</small> </p>    
                </form>
                  
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
  @endsection