@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex align-items-center" style="height:80vh;">
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}">
                <h1 class="h3 mb-3 fw-normal f-bo text-center">Form Registration</h1>
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                    <label for="name">Name</label>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="name@example.com" value="{{ old('email') }}" required
                        autocomplete="email">

                    <label for="email">Email address</label>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="password" value="{{ old('password') }}" required>

                    <label for="password">Password</label>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">

                    <input type="password"
                        class="form-control rounded-bottom @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation" placeholder="password confirm"
                        value="{{ old('password-confirm') }}" required>

                    <label for="password-confirm">Password</label>
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary w-100 mt-1">
                    {{ __('Register') }}
                </button>

            </form>
            <small class="mt-2 d-block text-center">Already Account?<a href="/login">Login Here!</a></small>

        </div>
    </div>
</div>

@endsection