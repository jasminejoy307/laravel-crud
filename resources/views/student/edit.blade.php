<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit Student</h2>
<form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"   value="{{ old('name', $student->sname) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email"   value="{{ old('email', $student->semail) }}">
    @error('email') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"  value="{{ old('phone', $student->phone) }}">
    @error('phone') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="room"> Select Class</label><br>
    <select class="form-control" name="room" id="room">
      @foreach ($rooms as $value)
      <option value="{{ $value->id }}" {{ ($student->classId == old('room', $value->id)) ? 'selected' : '' }}>{{ $value->cname }}</option>
    @endforeach
  </select>
    @error('room') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="img">Current Image:</label><br>
    @if($student->image)
      <img src="{{ asset('uploads/'.$student->image) }}" alt="Current Image" class="img-thumbnail" width="150">
    @else
      <p>No image available</p>
    @endif
  </div>
  <div class="form-group">
    <label for="img"> Choose Image:</label><br>
    <input type="file" class="form-control-file" id="myFile" name="filename">
    @error('filename') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>



</body>
</html>

