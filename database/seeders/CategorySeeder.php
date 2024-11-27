<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->firstOrCreate(
            [
                'title_en' => 'Articles categories',],
            [
                'title_ar' => 'قسم المقالات',
                'title_en' => 'Articles categories',
            ]);
        Category::query()->firstOrCreate(
            [
                'title_en' => 'Topics for discussion'],
            [
                'title_ar' => 'موضوعات للنقاش',
                'title_en' => 'Topics for discussion'
            ]);
    }
}
