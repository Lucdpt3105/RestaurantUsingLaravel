@extends('layouts.frontend')

@section('title', 'About Us - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <!-- About Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <p class="section-subtitle mb-4">About Us</p>
                <h1 class="section-title mb-6">Welcome to Santuy Restaurant</h1>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Since our establishment, Santuy Restaurant has been dedicated to providing an exceptional dining experience. 
                    We combine traditional recipes with modern culinary techniques to create unforgettable flavors.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Our team of passionate chefs and friendly staff work tirelessly to ensure every visit is memorable. 
                    We source the finest ingredients and craft each dish with love and attention to detail.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-cream-color p-6 rounded-lg">
                        <h3 class="text-3xl font-bold text-primary-color mb-2">15+</h3>
                        <p class="text-gray-600">Years Experience</p>
                    </div>
                    <div class="bg-cream-color p-6 rounded-lg">
                        <h3 class="text-3xl font-bold text-primary-color mb-2">50+</h3>
                        <p class="text-gray-600">Master Chefs</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400" alt="Restaurant" class="rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=400" alt="Food" class="rounded-lg shadow-lg mt-8">
            </div>
        </div>

        <!-- Our Team -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <p class="section-subtitle mb-4">Our Team</p>
                <h2 class="text-4xl font-bold" style="font-family: 'Cormorant', serif; color: var(--dark-color);">Meet Our Experts</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($teamMembers as $member)
                <div class="text-center group">
                    <div class="overflow-hidden rounded-lg mb-4">
                        <img src="{{ $member->photo }}" alt="{{ $member->name }}" 
                             class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    </div>
                    <h3 class="text-xl font-bold mb-1" style="font-family: 'Cormorant', serif;">{{ $member->name }}</h3>
                    <p class="text-primary-color mb-3">{{ $member->position }}</p>
                    @if($member->bio)
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($member->bio, 80) }}</p>
                    @endif
                    <div class="flex justify-center gap-3">
                        @if($member->facebook)
                            <a href="{{ $member->facebook }}" class="text-gray-600 hover:text-primary-color transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($member->twitter)
                            <a href="{{ $member->twitter }}" class="text-gray-600 hover:text-primary-color transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if($member->instagram)
                            <a href="{{ $member->instagram }}" class="text-gray-600 hover:text-primary-color transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Why Choose Us -->
        <div>
            <div class="text-center mb-12">
                <p class="section-subtitle mb-4">Why Choose Us</p>
                <h2 class="text-4xl font-bold" style="font-family: 'Cormorant', serif; color: var(--dark-color);">Our Services</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($services as $service)
                <div class="text-center bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition">
                    @if($service->image_url)
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3" style="font-family: 'Cormorant', serif;">{{ $service->title }}</h3>
                        <p class="text-gray-600">{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
