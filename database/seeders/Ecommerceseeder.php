<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EcommerceSeeder extends Seeder
{
    public function run(): void
    {
        // Create Brands
        $brands = [
            ['name' => 'LEGO', 'logo' => 'brands/lego.jpg', 'sort_order' => 1],
            ['name' => 'Fisher-Price', 'logo' => 'brands/fisher-price.jpg', 'sort_order' => 2],
            ['name' => 'Netgear', 'logo' => 'brands/netgear.jpg', 'sort_order' => 3],
            ['name' => 'Anova', 'logo' => 'brands/anova.jpg', 'sort_order' => 4],
            ['name' => 'Adidas', 'logo' => 'brands/adidas.jpg', 'sort_order' => 5],
            ['name' => 'Columbia', 'logo' => 'brands/columbia.jpg', 'sort_order' => 6],
            ['name' => 'Aussie', 'logo' => 'brands/aussie.jpg', 'sort_order' => 7],
            ['name' => 'Champion', 'logo' => 'brands/champion.jpg', 'sort_order' => 8],
            ['name' => 'Callaway', 'logo' => 'brands/callaway.jpg', 'sort_order' => 9],
            ['name' => 'Crockpot', 'logo' => 'brands/crockpot.jpg', 'sort_order' => 10],
            ['name' => 'Dash', 'logo' => 'brands/dash.jpg', 'sort_order' => 11],
            ['name' => 'Degree', 'logo' => 'brands/degree.jpg', 'sort_order' => 12],
            ['name' => 'Disney', 'logo' => 'brands/disney.jpg', 'sort_order' => 13],
            ['name' => 'Folgers', 'logo' => 'brands/folgers.jpg', 'sort_order' => 14],
            ['name' => 'Insignia', 'logo' => 'brands/insignia.jpg', 'sort_order' => 15],
            ['name' => 'Microsoft', 'logo' => 'brands/microsoft.jpg', 'sort_order' => 16],
            ['name' => 'Mega Construx', 'logo' => 'brands/mega-construx.jpg', 'sort_order' => 17],
            ['name' => "Nature's Bounty", 'logo' => 'brands/natures-bounty.jpg', 'sort_order' => 18],
            ['name' => "Peet's Coffee", 'logo' => 'brands/peets-coffee.jpg', 'sort_order' => 19],
            ['name' => 'New Balance', 'logo' => 'brands/new-balance.jpg', 'sort_order' => 20],
            ['name' => 'Neutrogena', 'logo' => 'brands/neutrogena.jpg', 'sort_order' => 21],
            ['name' => 'Old Spice', 'logo' => 'brands/old-spice.jpg', 'sort_order' => 22],
            ['name' => 'Nike', 'logo' => 'brands/nike.jpg', 'sort_order' => 23],
            ['name' => 'Under Armour', 'logo' => 'brands/under-armour.jpg', 'sort_order' => 24],
            ['name' => 'Van Heusen', 'logo' => 'brands/van-heusen.jpg', 'sort_order' => 25],
            ['name' => 'Volupa', 'logo' => 'brands/volupa.jpg', 'sort_order' => 26],
            ['name' => 'Capitol Records', 'logo' => 'brands/capitol.jpg', 'sort_order' => 27],
            ['name' => 'Sony', 'logo' => 'brands/sony.jpg', 'sort_order' => 28],
            ['name' => 'Nintendo', 'logo' => 'brands/nintendo.jpg', 'sort_order' => 29],
            ['name' => 'Targus', 'logo' => 'brands/targus.jpg', 'sort_order' => 30],
        ];

        foreach ($brands as $brandData) {
            Brand::create([
                'name' => $brandData['name'],
                'slug' => Str::slug($brandData['name']),
                'logo' => $brandData['logo'],
                'is_active' => true,
                'sort_order' => $brandData['sort_order']
            ]);
        }

        // Products Data
        $products = [
            [
                'brand' => 'Capitol Records',
                'name' => 'Sinnoa K. Hatsumana (Vinyl) Capitol multivolt',
                'price' => 27.50,
                'description' => 'Sinnoa K. Hatsumana (Vinyl) Capitol multivolt',
                'images' => ['products/1.jpg'],
                'features' => 'High quality vinyl record'
            ],
            [
                'brand' => 'Folgers',
                'name' => 'Folgers K-Cups Breakfast Blend, 12 Count (Pack of 6)',
                'price' => 41.76,
                'description' => 'Folgers K-Cups Breakfast Blend, 12 Count (Pack of 6)',
                'images' => ['products/2.jpg'],
                'features' => 'Rich coffee blend in convenient K-Cups'
            ],
            [
                'brand' => 'Insignia',
                'name' => 'Insignia - NS-HAWHP2 RF Wireless Over-Ear 2.4 Headphones - Black',
                'price' => 124.81,
                'description' => 'Insignia - NS-HAWHP2 RF Wireless Over-Ear 2.4 Headphones - Black',
                'images' => ['products/3.jpg'],
                'features' => 'Wireless RF technology; Over-ear design; 2.4GHz frequency'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Disney Princess Belle and The Beast\'s Castle 43196 Building Toy Set for Kids, Girls, and Boys Ages 8+ (505 Pieces)',
                'price' => 76.99,
                'description' => 'LEGO Disney Princess Belle and The Beast Castle building set',
                'images' => ['products/4.jpg'],
                'features' => '505 pieces; Ages 8+; Disney Princess theme'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO DOTS Adhesive Patches Mega Pack 41957 5in1 Set, DIY Stickers Kids\' Mosaic Crafts Kit, Personalized Decoration for Notebooks, Phone Cases or Room Décor',
                'price' => 27.22,
                'description' => 'LEGO DOTS Adhesive Patches Mega Pack for creative decoration',
                'images' => ['products/5.jpg'],
                'features' => '5-in-1 set; DIY stickers; Mosaic crafts kit'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Friends Andrea\'s Theater School 41714 Building Toy Set for Kids, Girls, and Boys Ages 8+ (1,154 Pieces)',
                'price' => 99.99,
                'description' => 'LEGO Friends Andrea Theater School building set',
                'images' => ['products/6.jpg'],
                'features' => '1,154 pieces; Ages 8+; Theater school theme'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Friends Beach Glamping 41700 Building Kit; Creative Girl & Boy Toys for Ages 6+ (380 Pieces)',
                'price' => 37.99,
                'description' => 'LEGO Friends Beach Glamping building kit',
                'images' => ['products/7.jpg'],
                'features' => '380 pieces; Ages 6+; Beach glamping theme'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Friends Magical Carnival 41685 Building Kit; Magic Carnival Creative Toy Set with 6 Mini Cute Vehicles; New 2021 (340 Pieces)',
                'price' => 40.50,
                'description' => 'LEGO Friends Magical Carnival with 6 mini vehicles',
                'images' => ['products/8.jpg'],
                'features' => '340 pieces; 6 mini vehicles; Carnival theme'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Friends Magical Carnival 41686 Building Kit; Magic Carnival Rides; New 2021 (340 Pieces)',
                'price' => 33.99,
                'description' => 'LEGO Friends Magical Carnival Rides building kit',
                'images' => ['products/9.jpg'],
                'features' => '340 pieces; Carnival rides; New 2021'
            ],
            [
                'brand' => 'LEGO',
                'name' => 'LEGO Marvel The Goat Boat 76208 Building Set - Thor Set with Toy Ship, Stormbreaker, and Movie Inspired Thor, Korg, and Valkyrie Minifigures, Avengers Gifts for Kids, Boys, and Girls Ages 8+',
                'price' => 47.44,
                'description' => 'LEGO Marvel The Goat Boat 76208 Building Set - Thor Set with Toy Ship, Stormbreaker, and Movie Inspired Thor, Korg, and Valkyrie Minifigures, Avengers Gifts for Kids, Boys, and Girls Ages 8+',
                'images' => ['products/10.jpg', 'products/10-thumb-1.jpg', 'products/10-thumb-2.jpg', 'products/10-thumb-3.jpg', 'products/10-thumb-4.jpg', 'products/10-thumb-5.jpg'],
                'features' => 'LEGO Marvel The Goat Boat 76208 Building Kit; Collectible Thor Construction Toy with 5 Minifigures for Kids Ages 8+ (564 Pieces)'
            ],
            [
                'brand' => "Nature's Bounty",
                'name' => 'Nature\'s Bounty Milk Thistle 1000 mg, 60 Softgels (1 Pack) (50 Count)',
                'price' => 35.50,
                'description' => 'Nature\'s Bounty Milk Thistle supplement',
                'images' => ['products/11.jpg'],
                'features' => '1000mg; 60 softgels; Liver support'
            ],
            [
                'brand' => "Nature's Bounty",
                'name' => 'Nature\'s Bounty Milk Thistle Capsules for Liver Support, Herbal Supplement Containing 250 mg per Serving, 200 Count',
                'price' => 22.00,
                'description' => 'Nature\'s Bounty Milk Thistle capsules for liver support',
                'images' => ['products/12.jpg'],
                'features' => '250mg per serving; 200 count; Herbal supplement'
            ],
            [
                'brand' => "Nature's Bounty",
                'name' => 'Nature\'s Bounty Saw Palmetto, Support for Prostate and Urinary Health, 450mg of Standardized Extract, 250 Softgel Capsules',
                'price' => 22.00,
                'description' => 'Nature\'s Bounty Saw Palmetto for prostate health',
                'images' => ['products/13.jpg'],
                'features' => '450mg extract; 250 capsules; Prostate support'
            ],
            [
                'brand' => "Nature's Bounty",
                'name' => 'Nature\'s Bounty Vitamin B-12 Methylcobalamin B12, 1000 mcg, 200 Tablets',
                'price' => 21.00,
                'description' => 'Nature\'s Bounty Vitamin B-12 supplement',
                'images' => ['products/14.jpg'],
                'features' => '1000mcg; 200 tablets; Methylcobalamin form'
            ],
            [
                'brand' => 'Netgear',
                'name' => 'NETGEAR 8-Port Gigabit Ethernet Unmanaged Switch (GS308) - Home Network Hub, Office Ethernet Splitter, Plug-and-Play, Fanless Housing for Quiet Operation, Desktop or Wall Mount',
                'price' => 168.99,
                'description' => 'NETGEAR 8-Port Gigabit Ethernet Switch',
                'images' => ['products/15.jpg'],
                'features' => '8 ports; Gigabit speed; Plug-and-play; Fanless design'
            ],
            [
                'brand' => 'Netgear',
                'name' => 'NETGEAR Nighthawk 8-Stream WiFi Router (C7800) - Compatible with Cable Plans Up to 400Mbps - DOCSIS 3.1 Gigabit Cable Modem Router Built-In WiFi 6 Spectrum, Cox for Cable Plans',
                'price' => 142.99,
                'description' => 'NETGEAR Nighthawk WiFi Router with cable modem',
                'images' => ['products/16.jpg'],
                'features' => '8-stream WiFi; DOCSIS 3.1; WiFi 6; Up to 400Mbps'
            ],
            [
                'brand' => 'Old Spice',
                'name' => 'Old Spice Body Wash for Men, Aluminum Free, Sea Spray Cologne Scent, 16.9 Fl Ounce, Pack of 4',
                'price' => 35.99,
                'description' => 'Old Spice Body Wash pack of 4',
                'images' => ['products/17.jpg'],
                'features' => 'Aluminum free; Sea Spray scent; 16.9 fl oz; Pack of 4'
            ],
            [
                'brand' => 'Old Spice',
                'name' => 'Old Spice, Beard Balm for Men, 2.22 fl oz',
                'price' => 9.98,
                'description' => 'Old Spice Beard Balm for grooming',
                'images' => ['products/18.jpg'],
                'features' => '2.22 fl oz; Beard grooming; Men\'s care'
            ],
            [
                'brand' => 'Capitol Records',
                'name' => 'Patient Number 9 - Red Colored Vinyl [Vinyl] Ozzy Osbourne',
                'price' => 29.99,
                'description' => 'Patient Number 9 red vinyl by Ozzy Osbourne',
                'images' => ['products/19.jpg'],
                'features' => 'Red colored vinyl; Limited edition; Ozzy Osbourne'
            ],
            [
                'brand' => 'Volupa',
                'name' => 'Volupa Organic & Fair Trade Unsweetened Super Food Cacao Powder',
                'price' => 27.00,
                'description' => 'Volupa organic cacao powder',
                'images' => ['products/20.jpg'],
                'features' => 'Organic; Fair trade; Unsweetened; Super food'
            ],
        ];

        foreach ($products as $productData) {
            $brand = Brand::where('name', $productData['brand'])->first();

            if (!$brand) continue;

            $product = Product::create([
                'brand_id' => $brand->id,
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'features' => $productData['features'],
                'price' => $productData['price'],
                'sku' => 'SKU-' . strtoupper(Str::random(8)),
                'stock' => 0,
                'status' => 'sold_out',
                'is_featured' => rand(0, 1),
            ]);

            // Add images
            foreach ($productData['images'] as $index => $imagePath) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                    'image_type' => $index === 0 ? 'main' : 'gallery',
                    'sort_order' => $index,
                ]);
            }
        }
    }
}
