@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-12 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-body">
                        <form role="form" method="post" class="text-start" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
                            @csrf
                            @if(isset($user))
                                @method('PUT')
                            @endif
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Full Name</label>
                                <input type="fullname" class="form-control" name="fullname" value="{{ isset($user) ? $user->name : '' }}">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <select id="options" class="form-control" name="role">
                                    <option value="teacher" {{ isset($user) && $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="text-center col-lg-2">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                            </div>
                        </form>

                        @include('partials.errors')

                        @include('partials.success')
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
