@extends('layouts.app')
@section('title','login')
@section('content')
    <section  class="global container mx-auto col-11 col-md-6">
        <form action="{{ route('login')}}" method="POST">
            @csrf
            <b>User name</b>
            <input type="text" name="name" placeholder="Your user mame please" id="" class="form-control">
            <b>User password</b>
            <input type="password" name="password" placeholder="Your user password please" id="" class="form-control"><br>
            <input type="submit" name="btn" value="Send" class="btn btn-info col-4">
        </form>
    </section>
@endsection