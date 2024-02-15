<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/crop.min.css') }}">
    <script src="{{ asset('assets/js/crop.min.js') }}"></script>
  </head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add Student</h2>
<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name"value="{{ old('name') }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email"   placeholder="Enter email"value="{{ old('email') }}">
    @error('email') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"   placeholder="Enter phone"value="{{ old('phone') }}">
    @error('phone') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="room"> Select Class</label><br>
    <select class="form-control" name="room" id="room">
      @foreach ($rooms as $value)
      <option value="" disabled selected hidden>select</option>
      <option value="{{ $value->id }}" {{ (old('room')==$value->id)?'selected':'' }}>{{ $value->cname }}</option>
      @endforeach
    </select>
    @error('room') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="img"> Choose Image:</label><br>
    {{-- <div class="slim avatar" data-label="Drop your avatar here" data-size="240,240" data-ratio="1:1">
      <input type="file" name="filename" required />
    </div> --}}
    <input type="file" name="filename" required />
    @error('filename') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
</form>
</div>
</div>
</div>



</body>
</html>

