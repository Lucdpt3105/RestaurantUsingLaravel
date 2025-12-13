@extends('admin.layout')

@section('title', 'Menu Items')
@section('page-title', 'Menu Items')

@section('content')
<div class="mb-6">
    <a href="{{ route('menus.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Add New Menu Item
        </a>
    </div>

    @if($menus->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <p class="text-gray-500 text-lg">Chưa có món ăn nào. Hãy thêm món đầu tiên!</p>
            <a href="{{ route('menus.create') }}" class="mt-4 inline-block bg-amber-600 text-white px-6 py-2 rounded-lg hover:bg-amber-700 transition">
                Thêm Món Ngay
            </a>
        </div>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hình ảnh</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên món</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Danh mục</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($menus as $menu)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $menu->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($menu->image_url)
                                <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="h-16 w-16 object-cover rounded">
                            @else
                                <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">No Image</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $menu->name }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($menu->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $menu->category === 'appetizer' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $menu->category === 'main' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $menu->category === 'dessert' ? 'bg-pink-100 text-pink-800' : '' }}
                                {{ $menu->category === 'drink' ? 'bg-purple-100 text-purple-800' : '' }}">
                                {{ ucfirst($menu->category) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($menu->price, 0, ',', '.') }}đ
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($menu->is_available)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Có sẵn
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Hết món
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('menus.show', $menu) }}" class="text-blue-600 hover:text-blue-900">Xem</a>
                                <a href="{{ route('menus.edit', $menu) }}" class="text-amber-600 hover:text-amber-900">Sửa</a>
                                <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Bạn có chắc muốn xóa món này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $menus->links() }}
        </div>
    @endif
</div>
@endsection
