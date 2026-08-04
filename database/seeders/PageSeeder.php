<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * php artisan db:seed --class=PageSeeder
     */
    public function run(): void
    {
        $pages = [
            ['title' => 'home', 'slug' => 'home', 'content' => 'This is the home page content.'],
            ['title' => 'about', 'slug' => 'about', 'content' => 'This is the home page content.'],
            ['title' => 'teams', 'slug' => 'teams', 'content' => 'This is the home page content.'],
            ['title' => 'contact', 'slug' => 'contact', 'content' => 'This is the home page content.'],
            ['title' => 'packages', 'slug' => 'packages', 'content' => 'This is the home page content.'],
            ['title' => 'services', 'slug' => 'services', 'content' => 'This is the home page content.'],
            ['title' => 'enlistments', 'slug' => 'enlistments', 'content' => 'This is the home page content.'],
            ['title' => 'blogs', 'slug' => 'blogs', 'content' => 'This is the home page content.'],
            ['title' => 'menus', 'slug' => 'menus', 'content' => 'This is the home page content.'],
        ];

        foreach ($pages as $p) {
            $page = Page::updateOrCreate(['slug' => $p['slug']], [
                'title' => $p['title'],
                'content' => $p['content']
            ]);

            // Seed SEO for each page
            $page->seo()->updateOrCreate([], [
                'meta_title' => $p['title'] . ' - ' . config('app.name'),
                'meta_description' => 'Description for ' . $p['title'],
                'meta_keywords' => strtolower($p['title']) . ', keyword1, keyword2',
            ]);
        }
    }
}
