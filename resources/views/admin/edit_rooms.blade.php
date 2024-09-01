@extends('admin.layouts.index')

@section('title', 'Edit Room')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Room</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Room</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Room Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
              </div>

              <div class="form-group">
                <label for="room_type">Room Type</label>
                <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $room->room_type }}" required>
              </div>

              <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->capacity }}" required>
              </div>

              <button type="submit" class="btn btn-primary">Update Room</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>
@endsection