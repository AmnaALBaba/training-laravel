@php
    use App\Models\User;
    $users = new User();
    $users = $users->get();
@endphp

@extends('admin.components.layout')
@section('content')
    <div class="container mt-4">
        <h3>login</h3>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="post">
            @csrf
            {{-- @method('post') --}}


            <div class = "mb-3">
                <label for="">Email</label>
                <input type="text" class = "form-control" name ="email">
            </div>
            <div class = "mb-3">
                <label for="">Password</label>
                <input type="password" class = "form-control" name ="password">
            </div>
            <button class = "btn btn-primary">Create</button>
        </form>


    </div>
@endsection
