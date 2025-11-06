<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Santuy Restaurant - Nhà Hàng Sang Trọng</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:700|inter:400,500,600" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-display {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-white antialiased">
    
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-3xl font-display font-bold text-amber-600">Santuy</h1>
                    <span class="ml-2 text-sm text-gray-600">Restaurant</span>
                </div>
                
                <!-- Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-amber-600 transition">Trang chủ</a>
                    <a href="#menu" class="text-gray-700 hover:text-amber-600 transition">Thực đơn</a>
                    <a href="#about" class="text-gray-700 hover:text-amber-600 transition">Giới thiệu</a>
                    <a href="#contact" class="text-gray-700 hover:text-amber-600 transition">Liên hệ</a>
                    <a href="{{ route('menus.index') }}" class="text-gray-700 hover:text-amber-600 transition font-semibold">Quản lý Menu</a>
                </div>
                
                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('menus.index') }}" class="bg-amber-600 text-white px-6 py-2 rounded-full hover:bg-amber-700 transition">
                        Admin Panel
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-20 bg-gradient-to-b from-amber-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-5xl md:text-6xl font-display font-bold text-gray-900 mb-6">
                        Trải Nghiệm <br>
                        <span class="text-amber-600">Ẩm Thực</span> <br>
                        Đẳng Cấp
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Khám phá hương vị độc đáo từ những món ăn được chế biến bởi đầu bếp hàng đầu, 
                        trong không gian sang trọng và ấm cúng.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#menu" class="bg-amber-600 text-white px-8 py-3 rounded-full hover:bg-amber-700 transition font-medium">
                            Xem Thực Đơn
                        </a>
                        <a href="#booking" class="border-2 border-amber-600 text-amber-600 px-8 py-3 rounded-full hover:bg-amber-50 transition font-medium">
                            Đặt Bàn
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800" 
                             alt="Restaurant" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-xl">
                        <p class="text-3xl font-bold text-amber-600">4.9★</p>
                        <p class="text-sm text-gray-600">1,200+ Đánh giá</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-display font-bold text-gray-900 mb-4">Tại Sao Chọn Chúng Tôi</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Chúng tôi cam kết mang đến trải nghiệm ẩm thực tuyệt vời nhất
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-xl hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Công Thức Độc Quyền</h4>
                    <p class="text-gray-600">
                        Món ăn được chế biến theo công thức truyền thống kết hợp hiện đại
                    </p>
                </div>

                <div class="text-center p-8 rounded-xl hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Nguyên Liệu Tươi Ngon</h4>
                    <p class="text-gray-600">
                        100% nguyên liệu tươi mới được chọn lọc kỹ càng mỗi ngày
                    </p>
                </div>

                <div class="text-center p-8 rounded-xl hover:shadow-lg transition">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Phục Vụ Nhanh Chóng</h4>
                    <p class="text-gray-600">
                        Đội ngũ chuyên nghiệp phục vụ tận tình, chu đáo
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Preview Section -->
    <section id="menu" class="py-20 bg-gradient-to-b from-white to-amber-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-display font-bold text-gray-900 mb-4">Thực Đơn Đặc Biệt</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Những món ăn được yêu thích nhất tại nhà hàng
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Menu Item 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600" 
                             alt="Salad" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Salad Tươi Mát</h4>
                            <span class="text-amber-600 font-bold">85.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Rau xanh tươi mới, sốt dầu giấm đặc biệt
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600" 
                             alt="Pizza" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Pizza Hải Sản</h4>
                            <span class="text-amber-600 font-bold">195.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Hải sản tươi ngon, phô mai mozzarella
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600" 
                             alt="Pasta" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Pasta Carbonara</h4>
                            <span class="text-amber-600 font-bold">145.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Mì Ý sốt kem, thịt hun khói thơm ngon
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>

                <!-- Menu Item 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600" 
                             alt="Burger" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Burger Bò Úc</h4>
                            <span class="text-amber-600 font-bold">165.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Thịt bò Úc 100%, phô mai cheddar
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>

                <!-- Menu Item 5 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=600" 
                             alt="Steak" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Beefsteak Wagyu</h4>
                            <span class="text-amber-600 font-bold">450.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Thịt bò Wagyu A5, nướng chín vừa
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>

                <!-- Menu Item 6 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition group">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600" 
                             alt="Soup" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-xl font-bold text-gray-900">Súp Bí Đỏ</h4>
                            <span class="text-amber-600 font-bold">75.000đ</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            Súp bí đỏ kem, bánh mì nướng giòn
                        </p>
                        <button class="w-full bg-amber-600 text-white py-2 rounded-lg hover:bg-amber-700 transition">
                            Đặt món
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-gray-900 text-white px-8 py-3 rounded-full hover:bg-gray-800 transition font-medium">
                    Xem Toàn Bộ Thực Đơn
                </a>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-4xl font-display font-bold mb-6">Đặt Bàn Ngay Hôm Nay</h3>
                    <p class="text-gray-300 mb-8">
                        Đặt bàn trước để có được vị trí đẹp nhất trong nhà hàng. 
                        Chúng tôi luôn sẵn sàng phục vụ bạn!
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-amber-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Hotline đặt bàn</p>
                                <p class="text-xl font-bold">1900 xxxx</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-amber-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Giờ mở cửa</p>
                                <p class="text-xl font-bold">10:00 - 22:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 text-gray-900">
                    <h4 class="text-2xl font-bold mb-6">Form Đặt Bàn</h4>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Họ và tên</label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent" 
                                   placeholder="Nhập họ tên của bạn">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Số điện thoại</label>
                            <input type="tel" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent" 
                                   placeholder="Nhập số điện thoại">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-2">Ngày</label>
                                <input type="date" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Giờ</label>
                                <input type="time" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Số người</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent">
                                <option>1 người</option>
                                <option>2 người</option>
                                <option>3-4 người</option>
                                <option>5-10 người</option>
                                <option>Trên 10 người</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Ghi chú</label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent" 
                                      rows="3" 
                                      placeholder="Yêu cầu đặc biệt..."></textarea>
                        </div>
                        <button type="submit" 
                                class="w-full bg-amber-600 text-white py-3 rounded-lg hover:bg-amber-700 transition font-medium">
                            Xác Nhận Đặt Bàn
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800" 
                         alt="Restaurant Interior" 
                         class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 bg-amber-600 text-white p-6 rounded-xl shadow-xl">
                        <p class="text-4xl font-bold">5+</p>
                        <p class="text-sm">Năm Kinh Nghiệm</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-4xl font-display font-bold text-gray-900 mb-6">Về Chúng Tôi</h3>
                    <p class="text-gray-600 mb-4">
                        Santuy Restaurant được thành lập với sứ mệnh mang đến những trải nghiệm ẩm thực 
                        đẳng cấp và đáng nhớ cho mọi thực khách.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Với đội ngũ đầu bếp giàu kinh nghiệm và tâm huyết, chúng tôi luôn không ngừng 
                        sáng tạo và cải tiến để mang đến những món ăn tuyệt vời nhất.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-amber-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h5 class="font-bold text-gray-900 mb-1">Chất Lượng Cao</h5>
                                <p class="text-sm text-gray-600">Nguyên liệu tươi mới mỗi ngày</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-amber-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <div>
                                <h5 class="font-bold text-gray-900 mb-1">Đầu Bếp Chuyên Nghiệp</h5>
                                <p class="text-sm text-gray-600">Kinh nghiệm quốc tế</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-2xl font-display font-bold text-amber-600 mb-4">Santuy</h4>
                    <p class="text-gray-400">
                        Nhà hàng phục vụ ẩm thực đa dạng với chất lượng cao nhất.
                    </p>
                </div>
                <div>
                    <h5 class="font-bold mb-4">Liên Kết</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#home" class="hover:text-amber-600 transition">Trang chủ</a></li>
                        <li><a href="#menu" class="hover:text-amber-600 transition">Thực đơn</a></li>
                        <li><a href="#about" class="hover:text-amber-600 transition">Giới thiệu</a></li>
                        <li><a href="#booking" class="hover:text-amber-600 transition">Đặt bàn</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-4">Giờ Mở Cửa</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li>Thứ 2 - Thứ 6: 10:00 - 22:00</li>
                        <li>Thứ 7 - CN: 09:00 - 23:00</li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold mb-4">Liên Hệ</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 Địa chỉ: 123 Đường ABC, TP.HCM</li>
                        <li>📞 Hotline: 1900 xxxx</li>
                        <li>✉️ Email: info@santuy.vn</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Santuy Restaurant. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
