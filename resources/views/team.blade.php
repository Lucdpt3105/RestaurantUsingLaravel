@extends('layouts.frontend')

@section('title', 'Our Team - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Our Team</p>
            <h1 class="section-title">Meet Our Experts</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Our passionate team is dedicated to creating exceptional dining experiences
            </p>
        </div>
        
        <!-- Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition group">
                <div class="relative overflow-hidden bg-gray-100">
                    <div class="aspect-square">
                        @if($member->photo)
                            <img src="{{ $member->photo }}" alt="{{ $member->name }}" 
                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-6xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Social Links Overlay -->
                    @if($member->facebook || $member->twitter || $member->instagram)
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <div class="flex gap-4">
                            @if($member->facebook)
                                <a href="{{ $member->facebook }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-primary-color hover:text-white transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-400 hover:bg-primary-color hover:text-white transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($member->instagram)
                                <a href="{{ $member->instagram }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-pink-600 hover:bg-primary-color hover:text-white transition">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold mb-2" style="font-family: 'Cormorant', serif; color: var(--dark-color);">
                        {{ $member->name }}
                    </h3>
                    <p class="text-primary-color font-medium mb-3">{{ $member->position }}</p>
                    @if($member->bio)
                        <p class="text-gray-600 text-sm">{{ $member->bio }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($teamMembers->isEmpty())
        <div class="text-center py-20">
            <p class="text-gray-500 text-lg">No team members available at the moment.</p>
        </div>
        @endif
    </div>
</section>
@endsection
