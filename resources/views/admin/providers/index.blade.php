@extends('layouts.app')
@section('content')
    <div class="my-2 mx-2 float-right">
        <a class="btn btn-success" href="{{route('dashboard.admin.providers.create')}}">Add Provider</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User_name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($providers as $provider)
            <tr>
                <th scope="row"> {{$provider->id}}</th>
                <th scope="row"> {{$provider->name}}</th>
                <th scope="row"> {{$provider->email}}</th>
                <th scope="row"> {{$provider->user_name}}</th>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
