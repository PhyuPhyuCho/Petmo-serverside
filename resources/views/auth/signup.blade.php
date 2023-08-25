<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #ffffff;
            padding: 150px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .signup-container h1 {
            text-align: center;
        }

        .signup-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            padding: 10px 15px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: #e74c3c;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>

        <form class="signup-form" method="POST" action="{{ route('signup') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <div>
                <button type="submit">Sign Up</button>
                <div class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
