@extends('admin.layout')

@section('title', $service->title)
@section('page-title', 'Service Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('services.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Services
    </a>
    
    <div class="flex space-x-3">
        <a href="{{ route('services.edit', $service) }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Edit
        </a>
        <form action="{{ route('services.destroy', $service) }}" 
              method="POST" 
              onsubmit="return confirm('Delete this service?');"
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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Service Image -->
    @if($service->image_url)
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full">
        </div>
    </div>
    @endif

    <!-- Service Info -->
    <div class="{{ $service->image_url ? 'lg:col-span-1' : 'lg:col-span-3' }}">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-center mb-6">
                @if($service->icon)
                    <div class="text-6xl mb-4">{{ $service->icon }}</div>
                @endif
                <h1 class="text-2xl font-bold text-gray-900">{{ $service->title }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $service->slug }}</p>
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Status</h3>
                    @if($service->is_active)
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">Inactive</span>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Sort Order</h3>
                    <p class="text-gray-900">{{ $service->sort_order }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Created</h3>
                    <p class="text-gray-900">{{ $service->created_at->format('M d, Y') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Last Updated</h3>
                    <p class="text-gray-900">{{ $service->updated_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="{{ $service->image_url ? 'lg:col-span-3' : 'lg:col-span-3' }}">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Description</h3>
            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $service->description }}</p>
        </div>
    </div>
</div>
@endsection