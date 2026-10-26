<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    {{-- I show validation or wrong-password errors here. --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- After registration, the success message is shown on this page. --}}
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        {{-- Every POST form needs this CSRF security token. --}}
        @csrf

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required>

        <br><br>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <br><br>

        <button type="submit">Login</button>
    </form>

    <br>
    <a href="{{ route('register') }}">Create an account</a>
</body>
</html>
