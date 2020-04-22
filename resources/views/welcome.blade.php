@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block');

    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('users.signup') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                    <label for="first_name">First Name</label>
                    <input id="first_name" class="form-control" type="text" name="first_name" 
                    value="{{ Request::old('first_name') }}">
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email1">E-mail</label>
                    <input id="email1" class="form-control" type="email" name="email" 
                    value="{{ Request::old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password1">Password</label>
                    <input id="password1" class="form-control" type="password" name="password" 
                    value="{{ Request::old('password') }}">
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div><!-- col-md-6 -->

        <div class="col-md-6">
            <h3>Sign In</h3>
            <form method="post" action="{{ route('users.signin') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ Request::old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" value="{{ Request::old('password') }}">
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div><!-- col-md-6 -->
    </div><!-- row -->
@endsection