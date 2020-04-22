@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <form method="post" action="{{ route('account.save') }}">
      @csrf
      @method('POST')
      
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input id="first_name" class="form-control" type="text" name="first_name" value="{{ $user->first_name }}">
      </div>

      <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection