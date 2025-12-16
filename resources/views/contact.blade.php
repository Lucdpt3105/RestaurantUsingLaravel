@extends('layouts.frontend')

@section('title', 'Contact Us - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="section-subtitle mb-4">Contact Us</p>
            <h1 class="section-title">Get In Touch</h1>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Send Message</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="/contact" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Name *</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email *</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="tel" name="phone"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Subject *</label>
                        <input type="text" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Message *</label>
                        <textarea name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary rounded-lg py-3 text-lg font-semibold">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                    <h2 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Contact Information</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-color rounded-full p-3 mr-4">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Address</h3>
                                <p class="text-gray-600">123 Restaurant Street, Food District, City 12345</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-color rounded-full p-3 mr-4">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Phone</h3>
                                <p class="text-gray-600">+84 123 456 789</p>
                                <p class="text-gray-600">+84 987 654 321</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-color rounded-full p-3 mr-4">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Email</h3>
                                <p class="text-gray-600">info@santuyrestaurant.com</p>
                                <p class="text-gray-600">booking@santuyrestaurant.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-color rounded-full p-3 mr-4">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold mb-1">Opening Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 08:00 AM - 09:00 PM</p>
                                <p class="text-gray-600">Saturday - Sunday: 10:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="font-bold mb-4">Follow Us</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center text-white hover:bg-opacity-80 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center text-white hover:bg-opacity-80 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center text-white hover:bg-opacity-80 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center text-white hover:bg-opacity-80 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Messages Section -->
        @if(isset($contacts) && $contacts->isNotEmpty())
        <div class="mt-20">
            <div class="text-center mb-12">
                <p class="section-subtitle mb-4">Messages</p>
                <h2 class="section-title">Recent Customer Messages</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($contacts as $contact)
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-primary-color flex items-center justify-center mr-4 text-white text-xl font-bold">
                            {{ strtoupper(substr($contact->name, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-lg">{{ $contact->name }}</h4>
                            <p class="text-gray-600 text-sm">{{ $contact->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <p class="font-semibold text-primary-color">{{ $contact->subject }}</p>
                    </div>
                    
                    <p class="text-gray-600">{{ Str::limit($contact->message, 150) }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
