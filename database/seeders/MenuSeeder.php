<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuPackage;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Category: Royal Kacchi Packages
        $royalCategory = MenuCategory::create([
            'name' => 'Royal Kacchi Packages',
            'slug' => 'royal-kacchi-packages',
            'description' => 'Authentic Shahi Kacchi Biryani & Traditional Royal Feasts',
            'order' => 1,
            'status' => true,
        ]);

        // Package 1: MENU-1 (Gold Kacchi Feast)
        $pkg1 = MenuPackage::create([
            'menu_category_id' => $royalCategory->id,
            'name' => 'MENU-1',
            'slug' => 'menu-1-gold-kacchi-feast',
            'subtitle' => 'Gold Kacchi Feast',
            'order' => 1,
            'status' => true,
        ]);

        $items1 = [
            'Royal Mutton Kacchi Biryani (Chinigura/Basmati)',
            'Royal Naan / Royal Rumali Roti',
            'Chicken Tandoori / Roasted Chicken (1/4 Piece)',
            'Beef Bhuna',
            'Royal Zarda / Firni (In Plastic Cup With Spoon)',
            'Borhani With Plain Creamy Yogurt',
            'Plum Chutney',
            'Pea Salad',
            'Mineral Water',
            'Royal Paan Box With Tissue',
        ];

        foreach ($items1 as $index => $itemName) {
            MenuItem::create([
                'menu_package_id' => $pkg1->id,
                'name' => $itemName,
                'item_no' => $index + 1,
                'order' => $index + 1,
            ]);
        }

        // Package 2: MENU-2 (Diamond Royal Feast)
        $pkg2 = MenuPackage::create([
            'menu_category_id' => $royalCategory->id,
            'name' => 'MENU-2',
            'slug' => 'menu-2-diamond-royal-feast',
            'subtitle' => 'Diamond Royal Feast',
            'order' => 2,
            'status' => true,
        ]);

        $items2 = [
            'Royal Mutton Kacchi Biryani (Chinigura/Basmati)',
            'Chicken Tandoori / Roasted Chicken (1/4 Piece)',
            'Beef Bhuna / Kofta Curry',
            'Royal Zarda / Firni (In Plastic Cup With Spoon)',
            'Borhani With Plain Creamy Yogurt',
            'Plum Chutney',
            'Pea Salad',
            'Mineral Water',
            'Royal Paan Box With Tissue',
        ];

        foreach ($items2 as $index => $itemName) {
            MenuItem::create([
                'menu_package_id' => $pkg2->id,
                'name' => $itemName,
                'item_no' => $index + 1,
                'order' => $index + 1,
            ]);
        }

        // Package 3: Platinum Shahi Menu
        $pkg3 = MenuPackage::create([
            'menu_category_id' => $royalCategory->id,
            'name' => 'Platinum Shahi Menu',
            'slug' => 'platinum-shahi-menu',
            'subtitle' => 'Exclusive Royal Shahi Platter',
            'order' => 3,
            'status' => true,
        ]);

        $items3 = [
            'Special Shahi Mutton Kacchi (Basmati)',
            'Shahi Chicken Roast',
            'Beef Kala Bhuna',
            'Special Jali Kabab',
            'Pashmi Firni / Zafrani Zarda',
            'Shahi Borhani & Matha',
            'Special Mix Salad & Chutney',
            'Premium Mineral Water',
        ];

        foreach ($items3 as $index => $itemName) {
            MenuItem::create([
                'menu_package_id' => $pkg3->id,
                'name' => $itemName,
                'item_no' => $index + 1,
                'order' => $index + 1,
            ]);
        }

        // 2. Category: Buffet Packages
        $buffetCategory = MenuCategory::create([
            'name' => 'Buffet Packages',
            'slug' => 'buffet-packages',
            'description' => 'Lavish Multi-Course Buffet Spreads for Big Celebrations',
            'order' => 2,
            'status' => true,
        ]);

        // Package 4: Standard Buffet
        $pkg4 = MenuPackage::create([
            'menu_category_id' => $buffetCategory->id,
            'name' => 'Standard Buffet',
            'slug' => 'standard-buffet',
            'subtitle' => 'Classic Grand Buffet',
            'order' => 1,
            'status' => true,
        ]);

        $items4 = [
            'Butter Rice / Fried Rice',
            'Grilled Chicken / BBQ Chicken',
            'Beef Pepper Steak',
            'Chinese Vegetable Stir Fry',
            'Fresh Green Salad',
            'Soft Drinks & Juices',
        ];

        foreach ($items4 as $index => $itemName) {
            MenuItem::create([
                'menu_package_id' => $pkg4->id,
                'name' => $itemName,
                'item_no' => $index + 1,
                'order' => $index + 1,
            ]);
        }

        // Package 5: Premium Buffet
        $pkg5 = MenuPackage::create([
            'menu_category_id' => $buffetCategory->id,
            'name' => 'Premium Buffet',
            'slug' => 'premium-buffet',
            'subtitle' => 'Luxury Buffet Experience',
            'order' => 2,
            'status' => true,
        ]);

        $items5 = [
            'Special Seafood Rice & Fried Rice',
            'Chicken Sizzling & Roasted Wings',
            'Mutton Rezala / Beef Steak',
            'Assorted Pasta & Lasagna',
            'Gourmet Dessert & Fruit Bar',
            'Fresh Juice Bar',
        ];

        foreach ($items5 as $index => $itemName) {
            MenuItem::create([
                'menu_package_id' => $pkg5->id,
                'name' => $itemName,
                'item_no' => $index + 1,
                'order' => $index + 1,
            ]);
        }
    }
}
