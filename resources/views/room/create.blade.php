<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add Room</h2>
<form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name"> Room Name</label>
    <input type="text" class="form-control" id="cname" name="cname"  placeholder="Enter room name"value="{{ old('cname') }}">
    @error('cname') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
</div>
</div>
</body>
</html>



