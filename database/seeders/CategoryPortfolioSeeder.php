<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolios = Portfolio::all();
        foreach ($portfolios as $portfolio) {
            $category_id = category::inRandomOrder()->first()->id;
            $portfolio->category_id = $category_id;
            $portfolio->update();
        }
    }
}
