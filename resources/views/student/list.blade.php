<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<body>
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
        <div class="my-4">
            <a href="{{ route('student.create') }}" class="btn btn-success">Add New</a>
        </div>
        <div class="my-4" style="">
            <a href="{{ route('student.import') }}" class="btn btn-primary">Import</a>
        </div>
        <div class="my-4" style="margin-right: 800px;">
            <a href="{{ route('student.export') }}" class="btn btn-primary">Export</a>
        </div>
        <div class="my-4" style="">
          <a href="{{ route('teachers.import_teachers') }}" class="btn btn-primary"> Teachers Import</a>
      </div>
        <div class="my-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" class="btn btn-danger logout">Logout</button>
            </form>
        </div>
    </div>
</div>
    @if (Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <table class="table">
      <tr>
        <th>Sl.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Phone</th>
        <th>Class</th>
        <th>Action</th>
      </tr>
      @forelse ($student as $key=>$students)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{$students->sname  }}</td>
        <td>{{$students->semail  }}</td>
       <td><img src="{{ asset('uploads/'.$students->image) }}" alt="image" style="object-fit: cover" width="50" height="50">
        </td>
        <td>{{$students->phone  }}</td>
        <td>{{ (!empty($students->room))?$students->room->cname:'Room not found'  }}</td>
        <td>
          <div class="d-flex gap-2">
          <a href="{{ route('student.show', $students->id) }}" class="btn btn-warning">View</a>
          <a href="{{ route('student.edit', $students->id) }}" class="btn btn-primary">Edit</a>
          <form action="{{ route('student.destroy', $students->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="button" class="btn btn-danger studentdel">Delete</button>
          </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td>No Data</td>
      </tr>
      @endforelse
    </table>
  </div>
  <script>
    $('.studentdel').on('click', function(e) {
      e.preventDefault();
      var curr = $(this); 
      $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to delete?',
        buttons: {
          confirm: function () {
            curr.parent('form').submit();
          },
          cancel: function () {

          },
        }
      });
    });

    $('.logout').on('click', function(e) {
      e.preventDefault();
      var curr = $(this); 
      $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to logout?',
        buttons: {
          confirm: function () {
            curr.parent('form').submit();
          },
          cancel: function () {

          },
        }
      });
    });
  </script>
</body>
</html>