<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Greeva - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/backend/img/favicon.ico') }}">

        @include('backend.partials.css')
        @include('backend.partials.js')
    </head>

    <body>
        @yield('content')
    </body>
</html>
