<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
      <div class="container">
        <div class="my-4"><a href="{{ route('student.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Student Details</h2>
    <form action="">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control"  value="{{$student->sname}} " readonly>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control"  value="{{$student->semail}} " readonly>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control"  value="{{$student->phone}} " readonly>
      </div>
      <div class="form-group">
        <label for="room">Room</label>
        <input type="text" class="form-control"  value="{{$student->room->cname}} " readonly>
      </div>
      <div class="form-group">
        <label for="image">Image</label><br>
        <img src="{{ asset('uploads/'.$student->image) }}" alt="image" style="object-fit: cover" width="150" height="150">
      </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>

