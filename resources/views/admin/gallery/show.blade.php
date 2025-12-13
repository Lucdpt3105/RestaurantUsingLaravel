@extends('admin.layout')

@section('title', $gallery->title ?? 'Image Details')
@section('page-title', 'Image Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('gallery.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Gallery
    </a>
    
    <div class="flex space-x-3">
        <a href="{{ route('gallery.edit', $gallery) }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Edit
        </a>
        <form action="{{ route('gallery.destroy', $gallery) }}" 
              method="POST" 
              onsubmit="return confirm('Delete this image?');"
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
    <!-- Image Preview -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full">
        </div>
    </div>

    <!-- Image Info -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Information</h3>
            
            <div class="space-y-4">
                @if($gallery->title)
                <div>
                    <label class="text-sm font-medium text-gray-500">Title</label>
                    <p class="text-gray-900 font-semibold">{{ $gallery->title }}</p>
                </div>
                @endif

                @if($gallery->description)
                <div>
                    <label class="text-sm font-medium text-gray-500">Description</label>
                    <p class="text-gray-900">{{ $gallery->description }}</p>
                </div>
                @endif

                @if($gallery->category)
                <div>
                    <label class="text-sm font-medium text-gray-500">Category</label>
                    <p class="text-gray-900">{{ $gallery->category }}</p>
                </div>
                @endif

                <div>
                    <label class="text-sm font-medium text-gray-500">Sort Order</label>
                    <p class="text-gray-900">{{ $gallery->sort_order }}</p>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-500">Status</label>
                    <div class="mt-1">
                        @if($gallery->is_active)
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">Inactive</span>
                        @endif
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-500">Image URL</label>
                    <p class="text-gray-900 text-sm break-all">{{ $gallery->image_url }}</p>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-500">Created</label>
                    <p class="text-gray-900">{{ $gallery->created_at->format('M d, Y') }}</p>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-500">Last Updated</label>
                    <p class="text-gray-900">{{ $gallery->updated_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection