@extends('layouts.frontend')

@section('title', 'Register - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4 max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center mb-2" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Create Account</h1>
            <p class="text-center text-gray-600 mb-8">Join Santuy Restaurant</p>

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('name') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('email') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Phone *</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Password *</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('password') border-red-500 @enderror">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Confirm Password *</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>

                <button type="submit" class="w-full btn-primary rounded-lg py-3 text-lg font-semibold">
                    Create Account
                </button>

                <p class="text-center mt-6 text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-primary-color hover:underline font-medium">Login here</a>
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
