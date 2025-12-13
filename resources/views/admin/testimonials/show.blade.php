@extends('admin.layout')

@section('title', 'Testimonial Details')
@section('page-title', 'Testimonial Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('testimonials.index') }}" class="text-gray-600 hover:text-gray-900 inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Back to Testimonials
    </a>
    
    <div class="flex space-x-3">
        <a href="{{ route('testimonials.edit', $testimonial) }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Edit
        </a>
        <form action="{{ route('testimonials.destroy', $testimonial) }}" 
              method="POST" 
              onsubmit="return confirm('Delete this testimonial?');"
              class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                Delete
            </button>
        </form>
    </div>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow p-8">
        <!-- Customer Info -->
        <div class="flex items-start space-x-6 mb-6">
            @if($testimonial->avatar)
                <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="w-24 h-24 rounded-full object-cover">
            @else
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            @endif

            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-900">{{ $testimonial->name }}</h2>
                @if($testimonial->position)
                    <p class="text-gray-600 mt-1">{{ $testimonial->position }}</p>
                @endif
                
                <div class="flex items-center mt-3">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        @else
                            <svg class="w-6 h-6 text-gray-300 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        @endif
                    @endfor
                    <span class="ml-3 text-lg text-gray-700 font-semibold">{{ $testimonial->rating }}/5</span>
                </div>

                <div class="mt-3">
                    @if($testimonial->is_active)
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">Inactive</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Testimonial Content -->
        <div class="border-t pt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Testimonial</h3>
            <div class="relative">
                <svg class="absolute top-0 left-0 w-8 h-8 text-amber-200" fill="currentColor" viewBox="0 0 32 32">
                    <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-1.1.9-2 2-2V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-1.1.9-2 2-2V8z"/>
                </svg>
                <p class="text-gray-700 text-lg leading-relaxed pl-12 italic">{{ $testimonial->content }}</p>
            </div>
        </div>

        <!-- Meta Info -->
        <div class="border-t mt-6 pt-6 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
            <div>
                <label class="block text-xs font-medium text-gray-500 uppercase">Sort Order</label>
                <p class="mt-1">{{ $testimonial->sort_order }}</p>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 uppercase">Created</label>
                <p class="mt-1">{{ $testimonial->created_at->format('M d, Y') }}</p>
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-500 uppercase">Last Updated</label>
                <p class="mt-1">{{ $testimonial->updated_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection