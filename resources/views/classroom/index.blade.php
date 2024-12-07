@extends('layouts.app')
@section('title', 'class room view')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Class Room List</h6>
                <h6 class="text-white text-capitalize ps-3">
                    <a href="{{ route('classroom.create') }}" class="add_class" title="Create New">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </h6>
                
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table-classroom">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL NO</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection