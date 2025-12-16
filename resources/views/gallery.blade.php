@extends('layouts.frontend')

@section('title', 'Gallery - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Gallery</p>
            <h1 class="section-title">Our Restaurant Gallery</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Explore our beautiful restaurant, delicious dishes, and memorable moments
            </p>
        </div>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $item)
            <div class="gallery-item bg-white rounded-lg overflow-hidden shadow-lg group cursor-pointer hover:shadow-xl transition">
                <div class="relative bg-gray-100">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ $item->image_url }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center p-6">
                        <div class="text-center text-white">
                            <h3 class="text-xl font-bold mb-2" style="font-family: 'Cormorant', serif;">{{ $item->title }}</h3>
                            @if($item->description)
                                <p class="text-sm">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($galleries->isEmpty())
        <div class="text-center py-20">
            <p class="text-gray-500 text-lg">No gallery images available at the moment.</p>
        </div>
        @endif
    </div>
</section>
@endsection
