@extends('panel.layouts.main-login')
@section('content')
<div class="page-header align-items-start min-vh-100" style="background-color: #fbe9ef">
  <span class="mask bg-gradient-dark opacity-6"></span>
  <div class="container my-auto">
    <div class="row">
      <div class="col-lg-4 col-md-8 col-12 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="row mt-3">
                <div class="col-12 text-center ms-auto">
                  <img src="{{ asset('gambar-umum/logo.png') }}" width="200px">
                </div>
              </div>
              <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">adminPanel</h4>
            </div>
          </div>
          <div class="card-body">
            @if(Session::has('loginError'))
            <div class="alert alert-danger" role="alert">
              <label style="color:white;">Username atau password salah!</label>
            </div>
            @endif
            <form role="form" class="text-start" action="{{ url('/login') }}" method="post">
              @csrf
              <div class="input-group input-group-outline my-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" autofocus>
              </div>
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
