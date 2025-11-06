@extends('layouts.app')

@section('title', 'Chỉnh Sửa Món - Santuy Restaurant')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('menus.index') }}" class="text-gray-600 hover:text-gray-900">
            ← Quay lại danh sách
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Chỉnh Sửa Món: {{ $menu->name }}</h1>

        <form action="{{ route('menus.update', $menu) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="space-y-6">
                <!-- Tên món -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Tên món <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name', $menu->name) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent"
                           placeholder="Nhập tên món ăn"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mô tả -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Mô tả <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent"
                              placeholder="Nhập mô tả món ăn"
                              required>{{ old('description', $menu->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Giá & Danh mục -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Giá (VNĐ) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="price" 
                               id="price" 
                               value="{{ old('price', $menu->price) }}"
                               step="0.01"
                               min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent"
                               placeholder="85000"
                               required>
                        @error('price')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Danh mục <span class="text-red-500">*</span>
                        </label>
                        <select name="category" 
                                id="category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent"
                                required>
                            <option value="appetizer" {{ old('category', $menu->category) == 'appetizer' ? 'selected' : '' }}>Khai vị</option>
                            <option value="main" {{ old('category', $menu->category) == 'main' ? 'selected' : '' }}>Món chính</option>
                            <option value="dessert" {{ old('category', $menu->category) == 'dessert' ? 'selected' : '' }}>Tráng miệng</option>
                            <option value="drink" {{ old('category', $menu->category) == 'drink' ? 'selected' : '' }}>Đồ uống</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- URL Hình ảnh -->
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Hình ảnh (tùy chọn)
                    </label>
                    <input type="url" 
                           name="image_url" 
                           id="image_url" 
                           value="{{ old('image_url', $menu->image_url) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent"
                           placeholder="https://example.com/image.jpg">
                    <p class="mt-1 text-sm text-gray-500">Nhập URL hình ảnh từ internet</p>
                    @error('image_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    
                    @if($menu->image_url)
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 mb-2">Hình ảnh hiện tại:</p>
                            <img src="{{ $menu->image_url }}" 
                                 alt="{{ $menu->name }}" 
                                 class="w-32 h-32 object-cover rounded-lg border">
                        </div>
                    @endif
                </div>

                <!-- Trạng thái -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="is_available" 
                               value="1"
                               {{ old('is_available', $menu->is_available) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-amber-600 shadow-sm focus:border-amber-300 focus:ring focus:ring-amber-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-700">Món ăn đang có sẵn</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('menus.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Hủy
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                        Cập Nhật
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
