<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
      <div class="container">
        <div class="my-4"><a href="{{ route('room.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h3 class="text-center mb-4">Room Details</h3>
      <form action="">
      <div class="form-group">
        <label for="name"> Room Name</label>
        <input type="text" class="form-control"  value="{{$room->cname }} " readonly>
      </div>
      </form>
    </div>
    </div>
    </div>
</body>
</html>
</body>
</html>

