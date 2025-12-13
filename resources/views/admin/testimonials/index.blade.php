@extends('admin.layout')

@section('title', 'Testimonials')
@section('page-title', 'Customer Testimonials')

@section('content')
<div class="mb-6">
    <a href="{{ route('testimonials.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Add Testimonial
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($testimonials->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No testimonials</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by adding your first testimonial.</p>
        </div>
    @else
        <div class="divide-y divide-gray-200">
            @foreach($testimonials as $testimonial)
            <div class="p-6 hover:bg-gray-50 transition">
                <div class="flex items-start space-x-4">
                    @if($testimonial->avatar)
                        <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded-full object-cover">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    @endif

                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $testimonial->name }}</h3>
                                @if($testimonial->position)
                                    <p class="text-sm text-gray-500">{{ $testimonial->position }}</p>
                                @endif
                                <div class="flex items-center mt-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">({{ $testimonial->rating }}/5)</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                @if(!$testimonial->is_active)
                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <p class="mt-3 text-gray-700 leading-relaxed">{{ Str::limit($testimonial->content, 200) }}</p>

                        <div class="mt-4 flex gap-4 text-sm">
                            <a href="{{ route('testimonials.show', $testimonial) }}" class="text-blue-600 hover:text-blue-900">View</a>
                            <a href="{{ route('testimonials.edit', $testimonial) }}" class="text-amber-600 hover:text-amber-900">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection