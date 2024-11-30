<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Firdaus</title>
    
    <!-- Favicons -->

    <link href="{{ asset('assets/user/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-image img {
            width: 100%;
            height: 100%;
            object-fit: fill;
            transform: rotate(90deg);
        }

        .login-form {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 50px;
            height: auto;
        }

        .brand-name {
            color: #1A5F3C;
            font-size: 1.5em;
            font-weight: 300;
        }

        h3 {
            color: #000;
            font-size: 1.1em;
            margin-bottom: 30px;
            font-weight: normal;
        }

        form {
            width: 100%;
        }

        label {
            font-weight: 500;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        input[type="username"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .login-form .login-btn {
            background-color: #1A5F3C;
            color: #ffffff;
            font-weight: 500;
            border-radius: 30px;
            padding: 8px 30px;
            border: 2px solid transparent;
            transition: 0.3s all ease-in-out;
            font-size: 14px;
            cursor: pointer;
            width: 50%;
        }

        .login-form .login-btn:hover {
            border-color: #34bf49;
            background-color: transparent;
            color: #34bf49;
        }

        .terms {
            font-size: 0.9em;
            color: #666;
            margin-top: 20px;
            text-align: center;
        }

        .terms a {
            color: #4CAF50;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-image {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ddd;
            }

            .login-form {
                padding: 20px;
            }

        }
    </style>
</head>

<body>
    
    <div class="container">
        <div class="login-container row mx-auto">
            <div class="login-image col-md-6 d-none d-md-block">
                <img src="{{ asset('assets/user/img/buahs.png') }}" alt="Vegetables and Fruits">
            </div>
            <div class="login-form col-md-6 col-12">
                <div class="logo-container">
                    <img src="{{ asset('assets/user/img/logo.png') }}" alt="Firdaus Logo" class="logo">
                    <span class="brand-name">Firdaus</span>
                </div>
                <h3>Sign in for admin</h3>

                <!-- Error message here -->
                @if ($errors->has('login'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('login') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" value="{{ old('username') }}" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <div style="text-align: center;">
                        <button type="submit" class="login-btn">Login</button>
                    </div>

                    <p class="terms">
                        By joining Admin, I confirm that I have read and agree to the Admin Firdaus
                        <a href="#">Terms of Service</a>, <a href="#">Privacy Policy</a>, and to receive emails and updates.
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert') <!-- SweetAlert directive -->

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
