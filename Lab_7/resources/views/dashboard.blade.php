<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>IT Student Portal</h1>

    {{-- auth()->user() gives me the user who is currently logged in. --}}
    <p>Welcome, {{ auth()->user()->name }}.</p>
    <p>Email: {{ auth()->user()->email }}</p>

    <form method="POST" action="{{ route('logout') }}">
        {{-- Logout is also a POST form, so it needs @csrf. --}}
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
