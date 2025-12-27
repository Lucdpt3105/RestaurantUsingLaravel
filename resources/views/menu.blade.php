@extends('layouts.frontend')

@section('title', 'Our Menu - Santuy Restaurant')

@section('content')

<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Our Menu</p>
            <h1 class="section-title">Discover Our Culinary Delights</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Explore our carefully curated menu featuring premium coffee, delicious dishes, sweet desserts, and refreshing drinks
            </p>
        </div>
        
        <!-- Category Filter -->
        <div class="flex justify-center gap-4 mb-12 flex-wrap">
            <button class="category-filter active px-8 py-3 rounded-full font-medium transition shadow-md" data-category="all">
                All Menu
            </button>
            @foreach($categories as $category)
            <button class="category-filter px-8 py-3 rounded-full font-medium transition shadow-md" data-category="{{ $category->id }}">
                {{ $category->name }}
            </button>
            @endforeach
        </div>
        
        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($menus as $menu)
            <div class="menu-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition duration-300" 
                 data-category="{{ $menu->category_id }}">
                @if($menu->image_url)
                <div class="h-48 overflow-hidden">
                    <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-2xl font-bold" style="font-family: 'Cormorant', serif;">
                                    {{ $menu->name }}
                                </h3>
                                @if($menu->is_featured)
                                <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full">Featured</span>
                                @endif
                            </div>
                            @if($menu->category)
                            <p class="text-sm text-primary-color font-medium mb-3">
                                {{ $menu->category->name }}
                            </p>
                            @endif
                        </div>
                        <div class="text-right">
                            <span class="text-2xl font-bold text-primary-color">
                                {{ number_format($menu->price) }}đ
                            </span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ $menu->description }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        @if($menu->is_available)
                        <span class="flex items-center text-green-600 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Available
                        </span>
                        <button onclick="addToCart({{ $menu->id }})" class="btn-primary rounded-full px-6 py-2 text-sm">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            Add to Cart
                        </button>
                        @else
                        <span class="flex items-center text-red-600 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Not Available
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($menus->isEmpty())
        <div class="text-center py-20">
            <p class="text-gray-500 text-lg">No menu items available at the moment.</p>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-dark-color text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6" style="font-family: 'Cormorant', serif;">
            Ready to Experience Our Culinary Excellence?
        </h2>
        <p class="text-gray-300 mb-8 text-lg max-w-2xl mx-auto">
            Reserve your table now and enjoy our exquisite menu in a perfect ambiance
        </p>
        <a href="/reservation" class="btn-primary rounded-none px-12 py-4 text-lg">
            Book Your Table
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Menu filtering
    const filterButtons = document.querySelectorAll('.category-filter');
    const menuItems = document.querySelectorAll('.menu-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.dataset.category;
            
            // Update active state
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-primary-color', 'text-white');
                btn.classList.add('bg-white', 'text-gray-700');
            });
            button.classList.add('active', 'bg-primary-color', 'text-white');
            button.classList.remove('bg-white', 'text-gray-700');
            
            // Filter items with animation
            menuItems.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.5s';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
    // Initialize first button as active
    if (filterButtons.length > 0) {
        filterButtons[0].classList.add('bg-primary-color', 'text-white');
        filterButtons[0].classList.remove('bg-white', 'text-gray-700');
    }
</script>

<style>
    .category-filter {
        background-color: white;
        color: var(--text-color);
        border: 2px solid transparent;
    }
    
    .category-filter:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }
    
    .category-filter.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush
