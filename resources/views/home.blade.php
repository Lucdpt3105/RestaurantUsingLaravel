@extends('layouts.frontend')

@section('title', 'Santuy Restaurant - Premium Coffee & Restaurant')

@section('content')

<!-- Hero Slider -->
<section class="relative" style="margin-top: 120px;">
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="relative h-screen">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=1920'); filter: brightness(0.7);"></div>
                    <div class="relative container mx-auto px-4 h-full flex items-center">
                        <div class="text-white max-w-2xl">
                            <p class="section-subtitle text-primary-color mb-4">Welcome to Santuy</p>
                            <h1 class="text-6xl md:text-7xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Reserve Your<br>Table Today</h1>
                            <div class="flex gap-4">
                                <a href="/menu" class="btn-primary rounded-none">Explore Menu</a>
                                <a href="/reservation" class="px-8 py-3 border-2 border-white text-white hover:bg-white hover:text-dark-color transition">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="relative h-screen">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1920'); filter: brightness(0.7);"></div>
                    <div class="relative container mx-auto px-4 h-full flex items-center">
                        <div class="text-white max-w-2xl">
                            <p class="section-subtitle text-primary-color mb-4">Welcome to Santuy</p>
                            <h1 class="text-6xl md:text-7xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Experience<br>Fine Dining</h1>
                            <div class="flex gap-4">
                                <a href="/menu" class="btn-primary rounded-none">Explore Menu</a>
                                <a href="/reservation" class="px-8 py-3 border-2 border-white text-white hover:bg-white hover:text-dark-color transition">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="relative h-screen">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1559329007-40df8a9345d8?w=1920'); filter: brightness(0.7);"></div>
                    <div class="relative container mx-auto px-4 h-full flex items-center">
                        <div class="text-white max-w-2xl">
                            <p class="section-subtitle text-primary-color mb-4">Welcome to Santuy</p>
                            <h1 class="text-6xl md:text-7xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Premium<br>Coffee & Food</h1>
                            <div class="flex gap-4">
                                <a href="/menu" class="btn-primary rounded-none">Explore Menu</a>
                                <a href="/reservation" class="px-8 py-3 border-2 border-white text-white hover:bg-white hover:text-dark-color transition">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="swiper-button-next !text-white"></div>
        <div class="swiper-button-prev !text-white"></div>
        <div class="swiper-pagination !bottom-8"></div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="section-subtitle mb-4">About Us</p>
                <h2 class="section-title mb-6">The Perfect Blend of Taste & Tradition</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Welcome to Santuy Restaurant, where culinary excellence meets warm hospitality. Since our establishment, 
                    we've been dedicated to creating memorable dining experiences through our carefully crafted dishes and 
                    exceptional service.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Our chefs combine traditional recipes with modern techniques, using only the finest locally-sourced 
                    ingredients to bring you flavors that will tantalize your taste buds.
                </p>
                <a href="/about" class="btn-primary rounded-none">Learn More About Us</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600" alt="Restaurant" class="w-full h-64 object-cover">
                <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600" alt="Food" class="w-full h-64 object-cover mt-8">
                <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?w=600" alt="Interior" class="w-full h-64 object-cover">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600" alt="Dining" class="w-full h-64 object-cover mt-8">
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section class="py-20" style="background-color: var(--cream-color);">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Our Menu</p>
            <h2 class="section-title">Discover Our Menu</h2>
        </div>
        
        <!-- Category Tabs -->
        <div class="flex justify-center gap-4 mb-12 flex-wrap">
            <button class="category-tab active px-6 py-3 font-medium transition" data-category="all">All</button>
            <button class="category-tab px-6 py-3 font-medium transition" data-category="coffee">Coffee</button>
            <button class="category-tab px-6 py-3 font-medium transition" data-category="food">Food</button>
            <button class="category-tab px-6 py-3 font-medium transition" data-category="desserts">Desserts</button>
            <button class="category-tab px-6 py-3 font-medium transition" data-category="drinks">Drinks</button>
        </div>
        
        <!-- Menu Items Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($featuredMenus as $menu)
            <div class="menu-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition" data-category="{{ $menu->category->slug ?? 'all' }}">
                @if($menu->image_url)
                <div class="h-48 overflow-hidden">
                    <img src="{{ $menu->image_url }}" alt="{{ $menu->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                </div>
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-semibold mb-1" style="font-family: 'Cormorant', serif;">{{ $menu->name }}</h3>
                            @if($menu->category)
                            <p class="text-sm text-primary-color">{{ $menu->category->name }}</p>
                            @endif
                        </div>
                        <span class="text-primary-color font-bold text-xl">{{ number_format($menu->price) }}đ</span>
                    </div>
                    <p class="text-gray-600">{{ $menu->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="/menu" class="btn-primary rounded-none">View Full Menu</a>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Gallery</p>
            <h2 class="section-title">Our Moments</h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $galleryImages = [
                'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600',
                'https://images.unsplash.com/photo-1559329007-40df8a9345d8?w=600',
                'https://images.unsplash.com/photo-1551218808-94e220e084d2?w=600',
                'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600',
                'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=600',
                'https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600',
                'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600',
                'https://images.unsplash.com/photo-1481833761820-0509d3217039?w=600',
            ];
            @endphp
            
            @foreach($galleryImages as $img)
            <div class="overflow-hidden group cursor-pointer">
                <img src="{{ $img }}" alt="Gallery" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="/gallery" class="btn-primary rounded-none">View More Photos</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20" style="background-color: var(--cream-color);">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Testimonials</p>
            <h2 class="section-title">What Our Customers Say</h2>
        </div>
        
        <div class="swiper testimonials-slider max-w-4xl mx-auto">
            <div class="swiper-wrapper">
                @php
                $testimonials = [
                    ['name' => 'Sarah Johnson', 'text' => 'Amazing food and excellent service! The ambiance is perfect for a romantic dinner.', 'rating' => 5],
                    ['name' => 'Michael Chen', 'text' => 'Best coffee in town! I come here every morning for their cappuccino.', 'rating' => 5],
                    ['name' => 'Emily Davis', 'text' => 'Love the cozy atmosphere and the staff is always friendly. Highly recommended!', 'rating' => 5],
                ];
                @endphp
                
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="bg-white p-12 text-center">
                        <div class="flex justify-center mb-6">
                            @for($i = 0; $i < $testimonial['rating']; $i++)
                            <i class="fas fa-star text-primary-color text-xl"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 text-lg mb-8 italic">"{{ $testimonial['text'] }}"</p>
                        <h4 class="font-semibold text-xl" style="font-family: 'Cormorant', serif;">{{ $testimonial['name'] }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

<!-- Reservation CTA -->
<section class="py-20 bg-dark-color text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1920');"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <p class="section-subtitle text-primary-color mb-4">Reservation</p>
            <h2 class="text-5xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Book Your Table Now</h2>
            <p class="text-gray-300 mb-8 text-lg">Join us for an unforgettable dining experience. Reserve your table today!</p>
            <a href="/reservation" class="btn-primary rounded-none text-lg px-12 py-4">Make a Reservation</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Hero Slider
    const heroSwiper = new Swiper('.hero-slider', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
    
    // Testimonials Slider
    const testimonialsSwiper = new Swiper('.testimonials-slider', {
        loop: true,
        autoplay: {
            delay: 4000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    
    // Menu Filter
    const categoryTabs = document.querySelectorAll('.category-tab');
    const menuItems = document.querySelectorAll('.menu-item');
    
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const category = tab.dataset.category;
            
            // Update active tab
            categoryTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            // Filter items
            menuItems.forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<style>
    .category-tab {
        color: var(--text-color);
        border-bottom: 2px solid transparent;
    }
    
    .category-tab:hover,
    .category-tab.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        color: white !important;
    }
    
    .swiper-pagination-bullet-active {
        background: var(--primary-color) !important;
    }
</style>
@endpush
