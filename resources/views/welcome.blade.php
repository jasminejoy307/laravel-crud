@extends('layout')
@push('header-tags')
<title>Login</title>
    <meta name="title" content="Login">
	<meta name="description" content="">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
@endpush
@section('content')
<div class="container">
    <div class="col-lg-6 mx-auto pt-5">
        @include('partials.alertmsg')
        <form action="{{ route('login') }}" method="POST" class="card">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                    @error('username') <div style="color: red">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="password" placeholder="Enter password">
                    @error('password') <div style="color: red">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</div>

{{-- 
name
email
role
isAdmin

@foreach ($users as $user)
    <div @class([
        'p-4',
        'font-bold' => $user->isAdmin,
        'text-gray-500' => !$user->isAdmin,
        'bg-red' => $hasError,
    ])>
        {{ $user->role->name }}    
    </div>
@endforeach




<input type="checkbox" name="gender" value="female" {{ (old('gender', $user->gender)=='female'?'checked':
'')? }}>
<input type="checkbox" name="gender" value="female" @checked(old('gender', $user->gender))>

 --}}


@endsection
@push('footer-tags')
<script>
    $('body').css('background-color','red');
</script>
@endpush