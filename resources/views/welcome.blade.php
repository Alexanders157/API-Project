<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Forum</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero {
            background-image: url('https://source.unsplash.com/random/1600x900?forum');
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ffffff;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #ffffff;
        }
        .btn {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            text-decoration: none;
            font-weight: 600;
        }
        .btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
<div class="hero">
    <div class="hero-content">
        <h1>Welcome to Laravel</h1>
        <p>A place to discuss and share your thoughts</p>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
</body>
</html>
