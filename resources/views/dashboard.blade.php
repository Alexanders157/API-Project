<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="hero">
        <div class="hero-content">
            <h1 class="text-3xl font-bold mb-4 text-white">Welcome to Your Dashboard</h1>
            <p class="text-lg mb-6 text-white">You're logged in!</p>
            <div class="text-center">
                <a href="{{ url('/') }}" class="btn" style="display: inline-block; margin: 0 auto;">Go to Home</a>
            </div>
        </div>

        @auth
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn">Log Out</button>
            </form>
        @endauth
    </div>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Figtree', sans-serif;
        }
        .hero {
            background-image: url('https://source.unsplash.com/random/1600x900?dashboard');
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100vw;
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
        .logout-form {
            position: absolute;
            top: 1rem;
            right: 1rem;
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
    </style>
</x-app-layout>
