@extends('layout.main')
@section('container')

<div class="row justify-content-center ">
  <div class="card col-lg-4 shadow mt-5" style="width: 410px; height: auto;">
    <main class="form-regisration w-100 m-auto">
      <h1 class="h3 mb-4 mt-4 fw-normal text-center">Daftar</h1>
        <form action="/register" method="POST">
          @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama Panggilan" value="{{ old('name') }}">
          <label for="name">Username</label>
          @error('name')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
            <div class="invalid-feedback">
             {{ $message }}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-3 mt-3" type="submit">Daftar</button>
        <small class="d-block text-center">Sudah punya akun? <a href="/" style="color: rgb(56, 182, 240);">Login sekarang!</a></small>
      </form>
    </main>
    <p class="mt-5 text-muted text-center">Dibuat dengan <i class="bi bi-heart-fill" style="color:rgb(240, 56, 56)"></i> oleh Abbaszabier</p>
  </div>
</div>
@endsection