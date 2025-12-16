@extends('layouts.frontend')

@section('title', 'Login - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4 max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center mb-2" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Welcome Back</h1>
            <p class="text-center text-gray-600 mb-8">Login to your account</p>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('email') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Password *</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('password') border-red-500 @enderror">
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                    <label for="remember" class="ml-2 text-gray-700">Remember me</label>
                </div>

                <button type="submit" class="w-full btn-primary rounded-lg py-3 text-lg font-semibold">
                    Login
                </button>

                <p class="text-center mt-6 text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary-color hover:underline font-medium">Register here</a>
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
