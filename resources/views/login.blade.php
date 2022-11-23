@extends('layout.main')
@section('container')
<div class="row justify-content-center ">
  <div class="card col-lg-5 shadow mt-5" style="width: 410px; height: auto;">

    @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

    <main class="form-signin w-100 m-auto">
      <h1 class="h3 mb-4 mt-4 fw-normal text-center">Masuk</h1>
        <form action="/" method="post">
          @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus required value="{{ old('name') }}">
          <label for="name">Username</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Masuk</button>
        <small class="d-block text-center">Belum punya akun? <a href="/register" style="color: rgb(56, 182, 240);">Daftar sekarang!</a></small>
      </form>
    </main>
    <p class="mt-5 text-muted text-center">Dibuat dengan <i class="bi bi-heart-fill" style="color:rgb(240, 56, 56)"></i> oleh Abbaszabier</p>
  </div>
</div>
@endsection