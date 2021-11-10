@extends('layouts.home')

@section('content')
<body class = "bg-image"> 
  <div class="container">
  <div class="row vh-100 d-flex justify-content-center align-items-center">
    <div class= "col-md-6 col-lg-6">
      <div class="card o-hidden border-0 shadow-lg">
        <div class="git row g-0">
          <div class="col-lg-6" >
            <a href="/" class="">
              <img src="images/doktor2.jpg" class="img img-fluid " >
            </a>
          </div>
             <div class="col-lg-6 ">
                <div class="card-body">
                <h3 class="card-title text-center mb-4 mt-5">Create Account</h3>
                <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                                <input type="text" id="name" placeholder="Enter Your Full Name" class="form-control form-login @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                                <input type="email" id="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                                <input type="password" id="password" placeholder="Password" class="form-control form-login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                                <input type="password" id="password-confirm" placeholder="Repeat Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col">
                                <button type="submit" class="btn btn-login btn-secondary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                 </form>
                 <hr>
                    <p class = "text-center"><small>Already have an account? <a href="{{ route('login') }}">Login</small> </p>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
    
  @endsection