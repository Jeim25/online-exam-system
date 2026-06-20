@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8 border-t-4 border-[#880000]">

        <div class="flex justify-center mb-4">
            <div class="w-12 h-12 bg-[#FFD700] rounded-full flex items-center justify-center text-[#880000] font-bold text-sm shadow-sm">PUP</div>
        </div>

        <h1 class="text-2xl font-bold text-[#880000] mb-2 text-center">Welcome Back</h1>
        <p class="text-sm text-gray-500 mb-6 text-center">Login to your account to continue.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#880000] focus:border-transparent @error('email') border-red-400 @enderror"
                    required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-[#880000] hover:underline">Forgot password?</a>
                    @endif
                </div>
                <input
                    type="password"
                    name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#880000] focus:border-transparent @error('password') border-red-400 @enderror"
                    required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-[#880000] text-white py-2.5 rounded-lg text-sm font-bold hover:bg-red-900 transition-colors shadow-md">
                Login
            </button>
        </form>

        <div class="mt-6 border-t border-gray-100 pt-4">
            <p class="text-center text-sm text-gray-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-[#880000] font-bold hover:underline">Register</a>
            </p>

            <p class="text-center text-sm text-gray-500 mt-2">
                <a href="{{ route('landing') }}" class="text-gray-400 hover:text-gray-600 transition-colors">← Back to Home</a>
            </p>
        </div>

    </div>
</div>
@endsection