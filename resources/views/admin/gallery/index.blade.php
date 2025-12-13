@extends('admin.layout')

@section('title', 'Gallery')
@section('page-title', 'Gallery')

@section('content')
<div class="mb-6">
    <a href="{{ route('gallery.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Upload Image
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($galleries->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No images</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by uploading your first image.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-6">
            @foreach($galleries as $gallery)
            <div class="group relative bg-gray-100 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ $gallery->image_url }}" 
                         alt="{{ $gallery->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition">
                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                        @if($gallery->title)
                            <h4 class="font-semibold truncate">{{ $gallery->title }}</h4>
                        @endif
                        @if($gallery->category)
                            <p class="text-xs text-gray-300">{{ $gallery->category }}</p>
                        @endif
                    </div>
                </div>

                <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition flex gap-2">
                    <a href="{{ route('gallery.show', $gallery) }}" 
                       class="p-2 bg-white rounded-full hover:bg-gray-100 transition">
                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('gallery.edit', $gallery) }}" 
                       class="p-2 bg-white rounded-full hover:bg-gray-100 transition">
                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                </div>

                @if(!$gallery->is_active)
                    <div class="absolute top-2 left-2">
                        <span class="px-2 py-1 bg-red-500 text-white text-xs rounded-full">Inactive</span>
                    </div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t">
            {{ $galleries->links() }}
        </div>
    @endif
</div>
@endsection