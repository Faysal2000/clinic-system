@extends('auth.master')


@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('auth/assets/images/logo-abbr.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-40 fw-bolder mb-4">Register</h2>

                        <form action="{{ route('register') }}" method="POST" class="w-100 mt-4 pt-2">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Full Name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}" required>
                            </div>

                            {{-- احذف هذا الحقل إذا ما بتستخدم username --}}
                            <div class="mb-4">
                                <input type="text" name="user_name" class="form-control" placeholder="Username"
                                    value="{{ old('user_name') }}">
                            </div>

                            <div class="mb-4 generate-pass">
                                <div class="input-group field">
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control"
                                        required>
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass">
                                        <i></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    class="form-control" required>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Create Account</button>
                            </div>
                        </form>

                        <div class="mt-5 text-muted">
                            <span>Already have an account?</span>
                            <a href="{{ route('login') }}" class="fw-bold">Login</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
