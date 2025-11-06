<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // Khai vị
            [
                'name' => 'Gỏi Cuốn Tôm Thịt',
                'description' => 'Bánh tráng cuốn tôm thịt tươi ngon với rau sống, bún và nước chấm đặc biệt',
                'price' => 45000,
                'category' => 'appetizer',
                'image_url' => 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Chả Giò Rế',
                'description' => 'Chả giò giòn rụm với nhân thịt heo, tôm và rau củ, kèm theo rau sống',
                'price' => 50000,
                'category' => 'appetizer',
                'image_url' => 'https://images.unsplash.com/photo-1626804475297-41608ea09aeb?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Salad Hải Sản',
                'description' => 'Salad tươi mát với tôm, mực và rau củ đa dạng, sốt chanh dây đặc trưng',
                'price' => 65000,
                'category' => 'appetizer',
                'image_url' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=800',
                'is_available' => true,
            ],

            // Món chính
            [
                'name' => 'Phở Bò Tái',
                'description' => 'Phở bò truyền thống với nước dùng hầm xương 12 tiếng, thịt bò tái mềm ngon',
                'price' => 75000,
                'category' => 'main',
                'image_url' => 'https://images.unsplash.com/photo-1555126634-323283e090fa?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Cơm Tấm Sườn Bì Chả',
                'description' => 'Cơm tấm với sườn nướng thơm phức, bì và chả trứng hấp dẫn',
                'price' => 70000,
                'category' => 'main',
                'image_url' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Bún Chả Hà Nội',
                'description' => 'Bún chả đặc sản Hà Nội với thịt nướng thơm lừng, nước mắm pha chuẩn vị',
                'price' => 68000,
                'category' => 'main',
                'image_url' => 'https://images.unsplash.com/photo-1559314809-0d155014e29e?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Hủ Tiếu Nam Vang',
                'description' => 'Hủ tiếu nước trong với tôm tươi, thịt heo và gan giòn',
                'price' => 65000,
                'category' => 'main',
                'image_url' => 'https://images.unsplash.com/photo-1617093727343-374698b1b08d?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Mì Xào Hải Sản',
                'description' => 'Mì xào giòn với tôm, mực, cua và rau củ tươi ngon',
                'price' => 85000,
                'category' => 'main',
                'image_url' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=800',
                'is_available' => true,
            ],

            // Tráng miệng
            [
                'name' => 'Chè Thái',
                'description' => 'Chè trái cây nhiệt đới với thạch, thạch dừa, sữa dừa tươi',
                'price' => 35000,
                'category' => 'dessert',
                'image_url' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Chè Bưởi',
                'description' => 'Chè bưởi thanh mát với cùi bưởi, dừa nạo và nước cốt dừa',
                'price' => 30000,
                'category' => 'dessert',
                'image_url' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Kem Dừa',
                'description' => 'Kem dừa tươi mát lạnh, làm từ 100% nước cốt dừa tươi',
                'price' => 40000,
                'category' => 'dessert',
                'image_url' => 'https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?w=800',
                'is_available' => true,
            ],

            // Đồ uống
            [
                'name' => 'Cà Phê Sữa Đá',
                'description' => 'Cà phê phin truyền thống pha với sữa đặc ngọt ngào',
                'price' => 28000,
                'category' => 'drink',
                'image_url' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Trà Đào Cam Sả',
                'description' => 'Trà đào tươi mát với hương thơm của cam và sả',
                'price' => 35000,
                'category' => 'drink',
                'image_url' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Nước Chanh Dây',
                'description' => 'Nước chanh dây tươi mát với hạt chanh giòn giòn',
                'price' => 25000,
                'category' => 'drink',
                'image_url' => 'https://images.unsplash.com/photo-1622597467836-f3285f2131b8?w=800',
                'is_available' => true,
            ],
            [
                'name' => 'Sinh Tố Bơ',
                'description' => 'Sinh tố bơ sánh mịn, béo ngậy với sữa tươi và đá',
                'price' => 38000,
                'category' => 'drink',
                'image_url' => 'https://images.unsplash.com/photo-1579954115545-a95591f28bfc?w=800',
                'is_available' => true,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
