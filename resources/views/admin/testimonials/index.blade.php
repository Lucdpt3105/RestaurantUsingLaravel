@extends('admin.layout')

@section('title', 'Contact Messages')
@section('page-title', 'Customer Messages')

@section('content')

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($contacts->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No contact messages</h3>
            <p class="mt-1 text-sm text-gray-500">No messages from customers yet.</p>
        </div>
    @else
        <div class="divide-y divide-gray-200">
            @foreach($contacts as $contact)
            <div class="p-6 hover:bg-gray-50 transition {{ $contact->is_read ? '' : 'bg-blue-50' }}">
                <div class="flex items-start space-x-4">
                    <div class="w-16 h-16 rounded-full bg-amber-600 flex items-center justify-center text-white text-xl font-bold">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>

                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $contact->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                                @if($contact->phone)
                                    <p class="text-sm text-gray-500">{{ $contact->phone }}</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-1">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>

                            <div class="flex items-center gap-2">
                                @if($contact->is_read)
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Read</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">New</span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="font-semibold text-gray-900">{{ $contact->subject }}</p>
                        </div>

                        <p class="mt-3 text-gray-700 leading-relaxed">{{ Str::limit($contact->message, 200) }}</p>

                        <div class="mt-4 flex gap-4 text-sm">
                            <a href="{{ route('contacts.show', $contact) }}" class="text-blue-600 hover:text-blue-900">View Full Message</a>
                            <a href="mailto:{{ $contact->email }}" class="text-green-600 hover:text-green-900">Reply via Email</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection