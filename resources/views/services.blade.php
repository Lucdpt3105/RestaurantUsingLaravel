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
@endsection
