@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <main class="form-registation">
            <h1 class="h3 mb-3 fw-normal text-center">Registation Form</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="enter your name..." id="name" name="name"  required value="{{ old('name') }}">
                    <label for="floatingInput">name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="enter your username" id="username" name="username" required value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                    
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" id="email" name="email" required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="enter your password" id="password" name="password" required>
                    <label for="floatingPassword">Password</label>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
            <small class="d-block text-center">Already registered? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection