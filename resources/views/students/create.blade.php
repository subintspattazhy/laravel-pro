@extends('layouts.app')

@section('title', 'Students')

@section('content')

<div class="container mt-5">
    <h2>Registration Form</h2>
    <form method="POST" action="{{ isset($students) ? route('students.update', $students->id) : route('students.store') }}">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        @if (isset($students))
            @method('PUT')
        @endif

        <div class="row">
            <!-- Name -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name"  name="name" value="{{$students->name ?? ''}}" placeholder="Enter your name">
            </div>

            <!-- Father Name -->
            <div class="col-md-6 mb-3">
                <label for="fatherName" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="fatherName" name="father_name"  value="{{$students->father_name ?? ''}}" placeholder="Enter father's name">
            </div>
        </div>

        <div class="row">
            <!-- Mother Name -->
            <div class="col-md-6 mb-3">
                <label for="motherName" class="form-label">Mother Name</label>
                <input type="text" class="form-control" id="motherName" name="mother_name" value="{{$students->mother_name ?? ''}}" placeholder="Enter mother's name">
            </div>

            <!-- District (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="district" class="form-label">District</label>
                <select class="form-select" id="district" name="district">
                    <option value="no" selected disabled>Select your district</option>
                    @foreach($districts as $district)
                    <option value="{{ $district }}" {{ isset($students) && $students->district == $district ? 'selected' : ''}}>
                        {{ $district }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Place -->
            <div class="col-md-6 mb-3">
                <label for="place" class="form-label">Place</label>
                <input type="text" class="form-control" id="place" name="place" value="{{$students->place ?? ''}}" placeholder="Enter your place">
            </div>

            <!-- Abroad Place -->
            <div class="col-md-6 mb-3">
                <label for="abroadPlace" class="form-label">Abroad Place</label>
                <input type="text" class="form-control" id="abroadPlace" name="abroad_place" value="{{$students->abroad_place ?? ''}}" placeholder="Enter abroad place (if any)">
            </div>
        </div>

        <div class="row">
            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" value="{{$students->dob ?? ''}}" name="dob">
            </div>

            <!-- Class (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" id="class" name="current_class_room_id">
                    <option value="mp" selected disabled>Select your class</option>
                    @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ isset($students) && $students->current_class_room_id == $class->id ? 'selected' : '' }}>
                        {{$class->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Teacher (Dropdown) -->
            <div class="col-md-6 mb-3">
                <label for="teacher" class="form-label" >Teacher</label>
                <select class="form-select" id="teacher" name="teacher">
                    <option value="" selected disabled>Select your teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}" {{ (isset($students) && $students->teacher_id == $teacher->id) ? 'selected' : '' }}>{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>
 
            <!-- Phone -->
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{$students->phone ?? ''}}" placeholder="Enter your phone number">
            </div>
        </div>

        <div class="row">
            <!-- WhatsApp -->
            <div class="col-md-6 mb-3">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="tel" class="form-control" id="whatsapp" name="whatsapp" value="{{$students->whatsapp ?? ''}}" placeholder="Enter your WhatsApp number">
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">Date of Join</label>
                <input type="date" class="form-control" id="join" value="{{ $students->join_date ?? '' }}" name="join_date">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="dob" class="form-label">active</label>
                <input type="checkbox" name="active" {{ isset ($students) && $students->active ? 'checked' : '' }}>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                {{ isset($students) ? 'Update' : 'Submit' }}
            </button>
        </div>
    </form>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        </div>
      @endif
</div>

@endsection