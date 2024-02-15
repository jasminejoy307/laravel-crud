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
        <h2 class="text-center mb-4">Import Teachers</h2>
        @if (Session::has('success'))
          <div class="alert alert-success">{!! Session::get('success') !!}</div>
        @endif
        @if (Session::has('error'))
          <div class="alert alert-danger">{!! Session::get('error') !!}</div>
        @endif
        <form action="{{ route('teachers.import_teachers') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="img"> Choose file (csv/xlsx):</label><br>
            <input type="file" name="filename" required />
            @error('filename') <div style="color: red">{{ $message }}</div> @enderror
          </div>
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>

