@extends('admin.layout')

@section('title', 'Reservations')
@section('page-title', 'Reservations')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('reservations.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        New Reservation
    </a>

    <div class="flex gap-2">
        <a href="?status=pending" class="px-4 py-2 {{ request('status') == 'pending' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700' }} rounded-lg border border-gray-300 hover:bg-amber-50">Pending</a>
        <a href="?status=confirmed" class="px-4 py-2 {{ request('status') == 'confirmed' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700' }} rounded-lg border border-gray-300 hover:bg-amber-50">Confirmed</a>
        <a href="?status=completed" class="px-4 py-2 {{ request('status') == 'completed' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700' }} rounded-lg border border-gray-300 hover:bg-amber-50">Completed</a>
        <a href="?status=cancelled" class="px-4 py-2 {{ request('status') == 'cancelled' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700' }} rounded-lg border border-gray-300 hover:bg-amber-50">Cancelled</a>
        <a href="{{ route('reservations.index') }}" class="px-4 py-2 {{ !request('status') ? 'bg-amber-600 text-white' : 'bg-white text-gray-700' }} rounded-lg border border-gray-300 hover:bg-amber-50">All</a>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($reservations->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No reservations</h3>
            <p class="mt-1 text-sm text-gray-500">No reservations found.</p>
        </div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guests</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($reservations as $reservation)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $reservation->name }}</div>
                        <div class="text-sm text-gray-500">{{ $reservation->email }}</div>
                        <div class="text-sm text-gray-500">{{ $reservation->phone }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($reservation->date)->format('M d, Y') }}</div>
                        <div class="text-sm text-gray-500">{{ $reservation->time }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $reservation->guests }} {{ Str::plural('guest', $reservation->guests) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($reservation->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif($reservation->status === 'confirmed')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                        @elseif($reservation->status === 'cancelled')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Completed</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="{{ route('reservations.edit', $reservation) }}" class="text-amber-600 hover:text-amber-900 mr-3">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline" onsubmit="return confirm('Delete this reservation?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4 bg-gray-50">
            {{ $reservations->links() }}
        </div>
    @endif
</div>
@endsection