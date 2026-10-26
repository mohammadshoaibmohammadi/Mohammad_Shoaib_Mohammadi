<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Create an account</h1>

    {{-- If validation has a problem, I show the errors here. --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- This message is shown after a successful registration. --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        {{-- @csrf adds a security token to the POST form. --}}
        @csrf

        <label for="name">Full name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required>

        <br><br>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required>

        <br><br>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" minlength="8" required>

        <br><br>

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" required>

        <br><br>

        <button type="submit">Register</button>
    </form>

    <br>
    <a href="{{ route('login') }}">Already have an account?</a>
</body>
</html>
