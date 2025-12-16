@extends('layouts.frontend')

@section('title', 'Book a Table - Santuy Restaurant')

@section('content')

<section class="py-20" style="margin-top: 120px; background-color: var(--cream-color);">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <p class="section-subtitle mb-4">Reservation</p>
                <h1 class="section-title">Book Your Table</h1>
                <p class="text-gray-600 mt-4">Reserve your table now for an unforgettable dining experience</p>
            </div>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded mb-8">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
            @endif

            <div class="bg-white p-8 md:p-12 rounded-lg shadow-lg">
                <form action="/reservation" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Name *</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}" placeholder="Your full name">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email *</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}" placeholder="your@email.com">
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Phone *</label>
                            <input type="tel" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('phone') border-red-500 @enderror"
                                value="{{ old('phone') }}" placeholder="+84 xxx xxx xxx">
                            @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Number of Guests *</label>
                            <select name="guests" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('guests') border-red-500 @enderror">
                                <option value="">Select number of guests</option>
                                @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Guest' : 'Guests' }}</option>
                                @endfor
                            </select>
                            @error('guests')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Date *</label>
                            <input type="date" name="date" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('date') border-red-500 @enderror"
                                value="{{ old('date') }}" min="{{ date('Y-m-d') }}">
                            @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Time *</label>
                            <select name="time" required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color @error('time') border-red-500 @enderror">
                                <option value="">Select time</option>
                                @foreach(['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00'] as $time)
                                <option value="{{ $time }}" {{ old('time') == $time ? 'selected' : '' }}>{{ $time }}</option>
                                @endforeach
                            </select>
                            @error('time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Special Requests (Optional)</label>
                        <textarea name="requests" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-primary-color"
                            placeholder="Any special requirements or dietary restrictions?">{{ old('requests') }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn-primary rounded-none px-12 py-4 text-lg">
                            Confirm Reservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
