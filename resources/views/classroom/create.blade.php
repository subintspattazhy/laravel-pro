@extends('layouts.app')

@section('title', 'Class Room')

@section('content')

<style>
    .custom-container {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="custom-container">
      <h2>Enter Class Name</h2>
      <form role="form" method="post" action="{{ isset($class) ? route('classroom.update', $class->id) : route('classroom.store') }}">

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

        @if (isset($class))
        @method('put')
        @endif

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $class->name ?? ''}}" placeholder="Enter your name">
          
          <label class="switch">
            <input type="checkbox" name="active" {{ isset($class) && $class->active ? 'checked' : '' }}><span class="slider"></span></label>
        </div>
        <button type="submit" class="btn btn-primary">
          {{ isset($class) ? 'update' : 'submit' }}
        </button>
      </form>

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        </div>
      @endif

    </div>
  </div>
</body>
@endsection