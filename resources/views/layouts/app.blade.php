<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@yield('title', 'Clinic System')</title>

    {{-- Global CSS --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
    {{-- Stack Styles --}}
    @stack('styles')
</head>

<body>

    {{-- Page Content --}}
    @yield('content')

    {{-- Global JS --}}
    <script src="/assets/js/app.js"></script>

    {{-- Stack Scripts --}}
    @stack('scripts')

</body>

</html>
