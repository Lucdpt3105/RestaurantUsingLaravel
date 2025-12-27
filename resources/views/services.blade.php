@extends('layouts.frontend')

@section('title', 'Our Services - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Our Services</p>
            <h1 class="section-title">What We Offer</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Discover the exceptional services we provide to make your dining experience memorable
            </p>
        </div>
        
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @foreach($services as $service)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                @if($service->image_url)
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" 
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>
                @endif
                
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4">
                        @if($service->icon)
                            <span class="text-4xl">{{ $service->icon }}</span>
                        @endif
                        <h3 class="text-2xl font-bold" style="font-family: 'Cormorant', serif; color: var(--dark-color);">
                            {{ $service->title }}
                        </h3>
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
        </div>

        @if($services->isEmpty())
        <div class="text-center py-20">
            <p class="text-gray-500 text-lg">No services available at the moment.</p>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
@if($testimonials->isNotEmpty())
<section class="py-20" style="background: var(--cream-color);">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4" style="color: var(--primary-color);">Testimonials</p>
            <h2 class="section-title" style="color: var(--dark-color);">What Our Customers Say</h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Don't just take our word for it - hear from our satisfied customers
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-lg p-8 shadow-lg hover:shadow-xl transition">
                <!-- Rating Stars -->
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <i class="fas fa-star text-yellow-400"></i>
                        @else
                            <i class="far fa-star text-gray-300"></i>
                        @endif
                    @endfor
                </div>
                
                <!-- Comment -->
                <p class="text-gray-700 mb-6 leading-relaxed italic">
                    "{{ $testimonial->content }}"
                </p>
                
                <!-- Customer Info -->
                <div class="flex items-center gap-4">
                    @if($testimonial->avatar)
                        <img src="{{ $testimonial->avatar }}" 
                             alt="{{ $testimonial->name }}" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-primary-color">
                    @else
                        <div class="w-12 h-12 rounded-full bg-primary-color flex items-center justify-center">
                            <span class="text-white font-bold text-lg">
                                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                            </span>
                        </div>
                    @endif
                    <div>
                        <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                        @if($testimonial->position)
                            <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-16" style="background: var(--cream-color);">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6" style="font-family: 'Cormorant', serif; color: var(--dark-color);">
            Ready to Experience Our Excellence?
        </h2>
        <p class="text-gray-600 mb-8 text-lg max-w-2xl mx-auto">
            Book your table now or order from our delicious menu
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('reservation') }}" class="btn-primary rounded-none px-12 py-4 text-lg">
                <i class="fas fa-calendar-alt mr-2"></i>Book a Table
            </a>
            <a href="{{ route('menu') }}" class="px-12 py-4 text-lg border-2 border-primary-color hover:bg-primary-color hover:text-white transition rounded-none" style="color: var(--primary-color);">
                <i class="fas fa-utensils mr-2"></i>View Menu
            </a>
        </div>
    </div>
</section>

@endsection
