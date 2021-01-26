@extends('layouts.app')

@section('title','Change password')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h1>Change Password</h1>
            <form action="{{route('changePassword')}}" method="post" enctype="multipart/form-data" class="d-flex flex-column w-50">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <div>{{$message}}</div>
                        @endforeach
                    </div>
                    @endif
                <div class="row form-group">
                    <label for="oldPassword" class="col-md-4 col-form-label text-md-right">Your Password </label>
                    <div class="col-md-6">
                        <input class="form-control" type="password" id="oldPassword" name="oldPassword"/>
                    </div>


                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">New {{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>

        </div>
    </div>
@endsection
