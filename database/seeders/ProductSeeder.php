<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();
        $cat   = Category::pluck('category_id', 'category_name');

        $items = [
            ['Salt Bread', 'Bread', 20000],
            ['Cinnamon Roll', 'Bread', 40000],
            ['Donat Isi Krim', 'Bread', 12000],
            ['Cheese Cake', 'Cakes', 45000],
            ['Birthday Cake', 'Cakes', 290000],
            ['Brownies Panggang', 'Cakes', 65000],
            ['Cookies Redvelvet', 'Cookies', 30000],
            ['Cookies Matcha', 'Cookies', 25000],
            ['Nastar', 'Cookies', 85000],
        ];

        foreach ($items as [$name, $category, $price]) {
            Product::create([
                'user_id'      => $admin->user_id,
                'category_id'  => $cat[$category],
                'product_name' => $name,
                'description'  => 'Dibuat segar dengan bahan berkualitas.',
                'price'        => $price,
            ]);
        }
    }
}
