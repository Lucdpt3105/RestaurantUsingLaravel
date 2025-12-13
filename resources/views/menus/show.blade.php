@extends('admin.layout')

@section('title', $menu->name)
@section('page-title', 'Menu Item Details')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('menus.index') }}" class="text-gray-600 hover:text-gray-900">
            ← Quay lại danh sách
        </a>
        
        <div class="flex space-x-3">
            <a href="{{ route('menus.edit', $menu) }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Chỉnh sửa
            </a>
            <form action="{{ route('menus.destroy', $menu) }}" 
                  method="POST" 
                  onsubmit="return confirm('Bạn có chắc muốn xóa món này?');"
                  class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Xóa
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @if($menu->image_url)
            <div class="w-full h-64 bg-gray-200">
                <img src="{{ $menu->image_url }}" 
                     alt="{{ $menu->name }}" 
                     class="w-full h-full object-cover">
            </div>
        @else
            <div class="w-full h-64 bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif

        <div class="p-8">
            <!-- Tên và danh mục -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $menu->name }}</h1>
                    @if($menu->category == 'appetizer')
                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">Khai vị</span>
                    @elseif($menu->category == 'main')
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Món chính</span>
                    @elseif($menu->category == 'dessert')
                        <span class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-sm font-medium">Tráng miệng</span>
                    @else
                        <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">Đồ uống</span>
                    @endif
                </div>
                <p class="text-3xl font-bold text-amber-600">{{ number_format($menu->price, 0, ',', '.') }} đ</p>
            </div>

            <!-- Mô tả -->
            <div class="mb-6 pb-6 border-b">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Mô tả</h2>
                <p class="text-gray-600 leading-relaxed">{{ $menu->description }}</p>
            </div>

            <!-- Thông tin chi tiết -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Trạng thái</h3>
                    @if($menu->is_available)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Có sẵn
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            Hết
                        </span>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Danh mục</h3>
                    <p class="text-gray-900">
                        @if($menu->category == 'appetizer')
                            Khai vị
                        @elseif($menu->category == 'main')
                            Món chính
                        @elseif($menu->category == 'dessert')
                            Tráng miệng
                        @else
                            Đồ uống
                        @endif
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Ngày tạo</h3>
                    <p class="text-gray-900">{{ $menu->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Cập nhật lần cuối</h3>
                    <p class="text-gray-900">{{ $menu->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
