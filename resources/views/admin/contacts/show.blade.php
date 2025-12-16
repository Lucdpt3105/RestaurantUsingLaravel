@extends('admin.layout')

@section('title', 'View Contact Message')
@section('page-title', 'Contact Message Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i>Back to Messages
        </a>
    </div>

    <div class="border-b pb-4 mb-6">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold mb-2">{{ $contact->subject }}</h2>
                <p class="text-gray-600">
                    Received on {{ $contact->created_at->format('F d, Y \a\t h:i A') }}
                </p>
            </div>
            @if(!$contact->is_read)
                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full">
                    New
                </span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <p class="text-lg">{{ $contact->name }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <p class="text-lg">
                <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">
                    {{ $contact->email }}
                </a>
            </p>
        </div>

        @if($contact->phone)
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
            <p class="text-lg">
                <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">
                    {{ $contact->phone }}
                </a>
            </p>
        </div>
        @endif
    </div>

    <div class="mb-8">
        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
        <div class="bg-gray-50 rounded-lg p-6">
            <p class="text-gray-800 whitespace-pre-wrap">{{ $contact->message }}</p>
        </div>
    </div>

    <div class="flex justify-between items-center pt-6 border-t">
        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
           class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            <i class="fas fa-reply mr-2"></i>Reply via Email
        </a>

        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Delete this message?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                <i class="fas fa-trash mr-2"></i>Delete
            </button>
        </form>
    </div>
</div>
@endsection
