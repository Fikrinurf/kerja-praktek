<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Register</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/assets/css/portal.css') }}">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="index.html">
                            <img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo">
                        </a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Register for Portal</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="auth-form-container text-start">
                        <form class="register-form" action="{{ url('/register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Name" required value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="Email address" required value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="Password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" placeholder="Confirm Password" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="sr-only">Phone Number</label>
                                <input id="phone_number" name="phone_number" type="text" class="form-control"
                                    placeholder="Phone Number" required value="{{ old('phone_number') }}">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="sr-only">Address</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Address" required>{{ old('address') }}</textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Register</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">
                            Already have an account? <a class="text-link" href="login.html">Login here</a>.
                        </div>
                    </div><!--//auth-form-container-->
                </div><!--//auth-body-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
    </div><!--//row-->
</body>

</html>
