@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Register') }}</h1>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input required id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input required id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input required id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input required id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">

                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-4 text-right">Gender</div>
                        <div class="col-md-6">
                            <div class=" form-check">
                                <input required id="gender-male" type="radio" class="form-check-input" value="male"
                                    name="gender">
                                <label for="gender-male" class="form-check-label">Male</label>
                            </div>

                            <div class="form-check">
                                <input required id="gender-female" type="radio" class="form-check-input" value="female"
                                    name="gender">
                                <label for="gender-female" class="form-check-label">Female</label>
                            </div>
                            @error('gender')
                            <div class="alert alert-danger">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <textarea required name="address" id="address" cols="38" rows="2"></textarea>
                            @error('address')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                    </div>



                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-right">Date of birth</label>

                        <div class="col-md-6">
                            <input required id="dob" type="date" class="form-control" name="dob">
                            @error('dob')
                            <div class="alert alert-danger">
                                <span>{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
