@extends('admin.layout')

@section('title', 'Menu Items')
@section('page-title', 'Menu Items')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <a href="{{ route('menus.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Add New Menu Item
    </a>
    
    <!-- Filter and Search Form -->
    <form method="GET" action="{{ route('menus.index') }}" class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
        <div class="relative">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}"
                   placeholder="Search menu..." 
                   class="w-full sm:w-64 px-4 py-2 pr-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
        </div>
        
        <select name="category" 
                onchange="this.form.submit()"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition">
            <i class="fas fa-filter"></i>
        </button>
        
        @if(request('search') || request('category'))
            <a href="{{ route('menus.index') }}" class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition">
                <i class="fas fa-redo"></i>
            </a>
        @endif
    </form>
</div>

<!-- Results count -->
@if(request('search') || request('category'))
<div class="mb-4 text-sm text-gray-600">
    Showing {{ $menus->total() }} result(s)
    @if(request('search'))
        for "<strong>{{ request('search') }}</strong>"
    @endif
    @if(request('category'))
        in <strong>{{ $categories->find(request('category'))->name ?? 'Unknown' }}</strong>
    @endif
</div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($menus->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No menu items</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new menu item.</p>
        </div>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($menus as $menu)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $menu->name }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($menu->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($menu->category)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $menu->category->name }}
                            </span>
                        @else
                            <span class="text-gray-400 text-sm">No category</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                        {{ number_format($menu->price) }}đ
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($menu->is_available)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Unavailable</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($menu->is_featured)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">Featured</span>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('menus.edit', $menu) }}" class="text-amber-600 hover:text-amber-900 mr-3">Edit</a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
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
            {{ $menus->appends(request()->query())->links() }}
        </div>
    @endif
</div>
@endsection
