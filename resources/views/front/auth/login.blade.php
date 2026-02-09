
@extends('layouts.admin')

@section('content')
<h2>Login Page</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- حقول تسجيل الدخول هنا -->
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
@endsection
