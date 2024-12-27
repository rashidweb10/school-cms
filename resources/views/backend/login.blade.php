@extends('backend.layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
    <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                {{--
                <a href="index.html" class="auth-brand mb-4">
                    <img src="{{ asset('backend/img/logo-dark.png') }}" alt="dark logo" height="26" class="logo-dark">
                    <img src="{{ asset('backend/img/logo.png') }}" alt="logo light" height="26" class="logo-light">
                </a>
                --}}

                <h4 class="fw-semibold mb-2 fs-18">Log in to your account</h4>

                <form action="index.html" class="text-start mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="example-email">Email</label>
                        <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="example-password">Password</label>
                        <input type="password" id="example-password" class="form-control" placeholder="Enter your password">
                    </div>
                    
                    {{--
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>

                        <a href="auth-recoverpw.html" class="text-muted border-bottom border-dashed">Forget Password</a>
                    </div>
                    --}}

                    <div class="d-grid">
                        <button class="btn btn-primary fw-semibold" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection