<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit Room</h2>
<form action="{{ route('room.update', $room->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name"> Room Name</label>
    <input type="text" class="form-control" id="cname" name="cname"   value="{{ old('cname', $room->cname) }}">
    @error('cname') <div style="color: red">{{ $message }}</div> @enderror
  </div>
 <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
</body>
</html>



