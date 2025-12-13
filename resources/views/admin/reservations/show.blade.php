@extends('admin.layout')

@section('title', 'Reservation Details')
@section('page-title', 'Reservation Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('reservations.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Reservations
    </a>
    
    <div class="flex space-x-3">
        <a href="{{ route('reservations.edit', $reservation) }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Edit
        </a>
        <form action="{{ route('reservations.destroy', $reservation) }}" 
              method="POST" 
              onsubmit="return confirm('Delete this reservation?');"
              class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Delete
            </button>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Customer Info -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Customer Information
        </h3>
        
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium text-gray-500">Name</label>
                <p class="text-gray-900 font-semibold">{{ $reservation->name }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-500">Email</label>
                <p class="text-gray-900">{{ $reservation->email }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-500">Phone</label>
                <p class="text-gray-900">{{ $reservation->phone }}</p>
            </div>
        </div>
    </div>

    <!-- Reservation Details -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Reservation Details
        </h3>
        
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium text-gray-500">Date</label>
                <p class="text-gray-900 font-semibold">{{ \Carbon\Carbon::parse($reservation->date)->format('l, F d, Y') }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-500">Time</label>
                <p class="text-gray-900 font-semibold">{{ $reservation->time }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-500">Number of Guests</label>
                <p class="text-gray-900">{{ $reservation->guests }} {{ Str::plural('guest', $reservation->guests) }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-500">Status</label>
                <div class="mt-1">
                    @if($reservation->status === 'pending')
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">Pending</span>
                    @elseif($reservation->status === 'confirmed')
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Confirmed</span>
                    @elseif($reservation->status === 'cancelled')
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">Cancelled</span>
                    @else
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">Completed</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Special Requests -->
    @if($reservation->special_requests)
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Special Requests
        </h3>
        <p class="text-gray-700 whitespace-pre-line">{{ $reservation->special_requests }}</p>
    </div>
    @endif

    <!-- Meta Info -->
    <div class="lg:col-span-2 bg-gray-50 rounded-lg p-4 text-sm text-gray-600">
        <div class="flex justify-between">
            <span>Created: {{ $reservation->created_at->format('M d, Y - h:i A') }}</span>
            <span>Last Updated: {{ $reservation->updated_at->format('M d, Y - h:i A') }}</span>
        </div>
    </div>
</div>
@endsection