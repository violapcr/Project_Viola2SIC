<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['category_name' => 'Bread', 'description' => 'Roti lembut dan harum, dipanggang segar setiap hari.'],
            ['category_name' => 'Cakes', 'description' => 'Cake dan tart untuk ulang tahun dan momen spesial.'],
            ['category_name' => 'Cookies', 'description' => 'Kue kering renyah, cocok untuk hampers dan camilan.'],
        ];

        foreach ($data as $row) {
            Category::create($row);
        }
    }
}
