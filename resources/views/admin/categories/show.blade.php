@extends('admin.layout')

@section('title', $category->name)
@section('page-title', 'Category Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Categories
    </a>
    
    <div class="flex space-x-3">
        <a href="{{ route('categories.edit', $category) }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Edit
        </a>
        <form action="{{ route('categories.destroy', $category) }}" 
              method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this category?');"
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
    <!-- Category Info -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-center mb-6">
                @if($category->icon)
                    <div class="text-6xl mb-4">{{ $category->icon }}</div>
                @endif
                <h1 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $category->slug }}</p>
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Description</h3>
                    <p class="text-gray-900">{{ $category->description ?? 'No description' }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Sort Order</h3>
                    <p class="text-gray-900">{{ $category->sort_order }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Status</h3>
                    @if($category->is_active)
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">Inactive</span>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Created</h3>
                    <p class="text-gray-900">{{ $category->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Items -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Menu Items ({{ $category->menus->count() }})</h3>
                <a href="{{ route('menus.create') }}?category_id={{ $category->id }}" 
                   class="text-amber-600 hover:text-amber-700 text-sm font-medium">
                    + Add Menu Item
                </a>
            </div>
            <div class="p-6">
                @if($category->menus->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">No menu items in this category yet</p>
                    </div>
                @else
                    <div class="grid gap-4">
                        @foreach($category->menus as $menu)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4">
                                    @if($menu->image_url)
                                        <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="w-20 h-20 object-cover rounded">
                                    @endif
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">{{ $menu->name }}</h4>
                                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($menu->description, 100) }}</p>
                                        <div class="mt-2 flex items-center gap-3">
                                            <span class="text-lg font-bold text-amber-600">{{ number_format($menu->price, 0, ',', '.') }} đ</span>
                                            @if($menu->is_available)
                                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Available</span>
                                            @else
                                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Unavailable</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('menus.show', $menu) }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">
                                    View →
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection