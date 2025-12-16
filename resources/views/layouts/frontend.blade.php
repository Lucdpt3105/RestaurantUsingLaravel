<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Santuy Restaurant - Premium Coffee & Restaurant')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-color: #C7A17A;
            --dark-color: #1A1A1A;
            --cream-color: #F9F5F0;
            --text-color: #333;
        }
        
        body {
            font-family: 'Josefin Sans', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cormorant', serif;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
            padding: 15px 35px;
            border: none;
            font-weight: 500;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: #b8935f;
            transform: translateY(-2px);
        }
        
        .section-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .section-subtitle {
            color: var(--primary-color);
            font-size: 0.9rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-cream-color">
    
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300" id="header">
        <!-- Top Bar -->
        <div class="bg-dark-color text-white py-3">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <i class="far fa-clock text-primary-color"></i>
                        <span>Opening Hours: 08:00 AM - 09:00 PM</span>
                    </div>
                    <div class="hidden md:flex gap-4">
                        <a href="#" class="hover:text-primary-color transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-primary-color transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-primary-color transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-primary-color transition"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone-alt text-primary-color"></i>
                        <span>+84 123 456 789</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <a href="/" class="text-3xl font-bold" style="font-family: 'Cormorant', serif; color: var(--primary-color);">
                        Santuy
                    </a>
                    
                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center gap-8">
                        <a href="/" class="hover:text-primary-color transition font-medium">Home</a>
                        <a href="/about" class="hover:text-primary-color transition font-medium">About</a>
                        <a href="{{ route('menu') }}" class="hover:text-primary-color transition font-medium">Menu</a>
                        <a href="/gallery" class="hover:text-primary-color transition font-medium">Gallery</a>
                        <a href="/team" class="hover:text-primary-color transition font-medium">Team</a>
                        <a href="/services" class="hover:text-primary-color transition font-medium">Services</a>
                        <a href="/contact" class="hover:text-primary-color transition font-medium">Contact</a>
                    </div>
                    
                    <!-- User Actions -->
                    <div class="hidden lg:flex items-center gap-4">
                        @auth
                            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2 hover:text-primary-color transition font-medium">
                                <i class="far fa-user"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn-primary rounded-none">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-primary-color transition font-medium">Login</a>
                            <a href="{{ route('register') }}" class="btn-primary rounded-none">Register</a>
                        @endauth
                        <a href="{{ route('reservation') }}" class="btn-primary rounded-none">
                            Book a Table
                        </a>
                    </div>
                    
                    <!-- Mobile Menu Toggle -->
                    <button class="lg:hidden text-2xl" id="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>
        
        <!-- Mobile Menu -->
        <div class="lg:hidden bg-white shadow-md hidden" id="mobile-menu">
            <div class="container mx-auto px-4 py-4">
                <div class="flex flex-col gap-4">
                    <a href="/" class="hover:text-primary-color transition font-medium">Home</a>
                    <a href="/about" class="hover:text-primary-color transition font-medium">About</a>
                    <a href="/menu" class="hover:text-primary-color transition font-medium">Menu</a>
                    <a href="/gallery" class="hover:text-primary-color transition font-medium">Gallery</a>
                    <a href="/team" class="hover:text-primary-color transition font-medium">Team</a>
                    <a href="/services" class="hover:text-primary-color transition font-medium">Services</a>
                    <a href="/contact" class="hover:text-primary-color transition font-medium">Contact</a>
                    <a href="/reservation" class="btn-primary rounded-none inline-block text-center">Book a Table</a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-dark-color text-white pt-20 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- About -->
                <div>
                    <h3 class="text-3xl mb-6" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Santuy</h3>
                    <p class="text-gray-400 mb-4">Experience the finest coffee and cuisine in a cozy atmosphere. We serve quality food with passion.</p>
                    <div class="flex gap-4 mt-6">
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center hover:bg-opacity-80 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center hover:bg-opacity-80 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-primary-color rounded-full flex items-center justify-center hover:bg-opacity-80 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="text-xl font-semibold mb-6" style="font-family: 'Cormorant', serif;">Contact Us</h4>
                    <div class="space-y-4 text-gray-400">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-primary-color mt-1"></i>
                            <span>123 Restaurant St, Ho Chi Minh City, Vietnam</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-primary-color"></i>
                            <span>+84 123 456 789</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope text-primary-color"></i>
                            <span>info@santuy.com</span>
                        </div>
                    </div>
                </div>
                
                <!-- Opening Hours -->
                <div>
                    <h4 class="text-xl font-semibold mb-6" style="font-family: 'Cormorant', serif;">Opening Hours</h4>
                    <div class="space-y-3 text-gray-400">
                        <div class="flex justify-between">
                            <span>Monday - Friday</span>
                            <span class="text-primary-color">08:00 - 21:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Saturday</span>
                            <span class="text-primary-color">09:00 - 22:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Sunday</span>
                            <span class="text-primary-color">10:00 - 20:00</span>
                        </div>
                    </div>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h4 class="text-xl font-semibold mb-6" style="font-family: 'Cormorant', serif;">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe to get special offers and updates</p>
                    <form class="flex flex-col gap-3">
                        <input type="email" placeholder="Your email" class="px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-none focus:outline-none focus:border-primary-color">
                        <button type="submit" class="btn-primary rounded-none">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Santuy Restaurant. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        
        // Sticky Header
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-lg');
                header.querySelector('nav').classList.add('py-2');
            } else {
                header.classList.remove('shadow-lg');
                header.querySelector('nav').classList.remove('py-2');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>