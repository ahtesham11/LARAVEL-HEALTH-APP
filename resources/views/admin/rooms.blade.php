@extends('admin.layouts.index')
@section('title', 'Details Of Rooms')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>@yield('title', 'Default Title')</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">@yield('title', 'Default Title')</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Rooms Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>Availablity</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>
                      <button type="button" class="btn btn-sm {{ $room->is_allotted ? 'btn-outline-success': 'btn-outline-danger' }}" 
                              onclick="toggleRoomStatus({{ $room->id }})">
                          {{ $room->is_allotted ? 'Allotted' : 'Available' }}
                      </button>
                    </td>
                    <td> 
                      <a type="button" class="btn btn-sm btn-outline-success" href="{{ route('rooms.edit', $room->id) }}">
                        <i class="fa fa-home"></i> Edit Room
                      </a>
                      <button type="button" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-bug"></i> Change Status
                      </button>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>Availablity</th>
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
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
  <script>
    
function toggleRoomStatus(roomId) {
    alert(roomId);
    fetch(`/rooms/${roomId}/toggle`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Reload the page to see the updated status
        } else {
            alert('Failed to toggle room status');
        }
    })
    .catch(error => console.error('Error:', error));
}

  </script>
@endsection
    