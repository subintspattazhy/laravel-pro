@extends('layouts.app')
@section('title', 'users')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                    <h6 class="text-white text-capitalize p-2 mb-0">Users</h6>
                    <a href="{{ route('users.create') }}" class="badge badge-sm bg-gradient-success me-2">Add User</a>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table-users">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL NO</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $index + 1 }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">@if($user->active == 1)
                                    <span class="badge badge-sm bg-gradient-success">Enabled</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-secondary">Disabled</span>
                                    @endif</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ ucfirst($user->role) }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-1 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-primary me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:none;" title="Delete" onclick="return confirm('Are you sure you want to delete this classroom?')">
                                        <i class="fa fa-trash text-primary" aria-hidden="true"></i>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection