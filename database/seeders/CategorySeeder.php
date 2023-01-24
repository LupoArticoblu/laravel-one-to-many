<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'JS', 'PHP', 'C#'];

        foreach ($data as $item) {
            $new_category = new category();
            $new_category->name = $item;
            $new_category->slug = Str::slug($item);
            $new_category->save();
        }
    }
}
