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
              <img src="images/slider1.jpg" class="img-fluid" >
            </a>
          </div>
          <div class="col-lg-5">
              <div class="card-body">
                <h3 class="card-title text-center mb-2">Reset Password</h3>
                @if (session()->has('error'))
                <div class="alert alert-danger mb-2" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="/resetpass">
                  @csrf
                  <div class="mb-3">
                    <input type="email" id="email" placeholder="Enter Your Email Address" class="form-control form-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @if (session()->has('error'))
                    <div class="text-danger text-small text-center" role="alert">
                         {{ $errors->reset->first('email') }}
                    </div>
                    @endif
                  </div>
                  
                  <div class="mb-3">
                    <input type="password" id="oldpassword" placeholder="Old Password" class="form-control form-login @error('password') is-invalid @enderror" name="oldpassword" required>
                    @if (session()->has('error'))
                    <div class="text-danger text-small text-center" role="alert">
                        {{ $errors->reset->first('oldpassword') }}
                    </div>
                    @endif
                  </div>
                  
                  <div class="mb-3">
                    <input type="password" id="newpassword" placeholder="New Password" class="form-control form-login @error('password') is-invalid @enderror" name="newpassword" required>
                    @if (session()->has('error'))
                    <div class="text-danger text-small text-center" role="alert">
                        {{ $errors->reset->first('newpassword') }}
                    </div>
                    @endif
                  </div>

                  <div class="mb-3">
                    <input type="password" id="newpassword-confirm" placeholder="Repeat New Password" class="form-control form-login @error('password') is-invalid @enderror" name="newpassword-confirm" required>
                    @if (session()->has('error'))
                    <div class="text-danger text-small text-center" role="alert">
                        {{ $errors->reset->first('newpassword-confirm') }}
                    </div>
                    @endif
                  </div>
                  <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                  </div>
                  <hr>
                  <p class = "text-center"><small>Already have an account? <a href="{{ route('login') }}">Login</small> </p>
                  <p class="text-center"><small>Don't have account? <a href="{{ route('register') }}" >Create an Account!!!</small> </p>    
              </form>
                  
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
    
@endsection