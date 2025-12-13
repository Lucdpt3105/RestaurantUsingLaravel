@extends('admin.layout')

@section('title', 'Services')
@section('page-title', 'Our Services')

@section('content')
<div class="mb-6">
    <a href="{{ route('services.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Add Service
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($services->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No services</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by adding your first service.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($services as $service)
            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                @if($service->image_url)
                    <div class="aspect-video overflow-hidden bg-gray-100">
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            @if($service->icon)
                                <span class="text-3xl">{{ $service->icon }}</span>
                            @endif
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $service->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $service->slug }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($service->description, 120) }}</p>
                    
                    <div class="flex items-center gap-2 mb-4">
                        @if(!$service->is_active)
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Inactive</span>
                        @endif
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">Order: {{ $service->sort_order }}</span>
                    </div>

                    <div class="flex gap-2 text-sm pt-4 border-t">
                        <a href="{{ route('services.show', $service) }}" class="flex-1 text-center px-3 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 transition">View</a>
                        <a href="{{ route('services.edit', $service) }}" class="flex-1 text-center px-3 py-2 bg-amber-100 text-amber-700 rounded hover:bg-amber-200 transition">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t">
            {{ $services->links() }}
        </div>
    @endif
</div>
@endsection