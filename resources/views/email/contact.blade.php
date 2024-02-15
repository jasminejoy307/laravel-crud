@extends('layout')
@push('header-tags')
<title>Contact Form</title>
@endpush
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
    <h2 class="text-center mb-4">Contact Form</h2>
   <form action="{{ route('contact.action') }}" method="POST" >
     @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
  </div><br>
   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
  </div><br>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone">
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
</div>
</div>
@endsection



