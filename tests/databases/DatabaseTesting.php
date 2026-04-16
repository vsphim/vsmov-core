<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use VsMov\Core\Database\Seeders\CategoriesTableSeeder;
use VsMov\Core\Database\Seeders\SettingsTableSeeder;
use VsMov\Core\Database\Seeders\RegionsTableSeeder;
use VsMov\Core\Database\Seeders\ThemesTableSeeder;
use VsMov\Core\Database\Seeders\MenusTableSeeder;
use VsMov\Core\Models\Actor;
use VsMov\Core\Models\Category;
use VsMov\Core\Models\Director;
use VsMov\Core\Models\Episode;
use VsMov\Core\Models\Movie;
use VsMov\Core\Models\Region;
use VsMov\Core\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function test()
    {
        $this->call([
            CategoriesTableSeeder::class,
            RegionsTableSeeder::class,
            ThemesTableSeeder::class,
            MenusTableSeeder::class,
            SettingsTableSeeder::class,
        ]);

        Actor::factory(100)->create();
        Director::factory(100)->create();
        Tag::factory(100)->create();

        for ($i = 1; $i < 1000; $i++) {
            Movie::factory(1)
                ->state([
                    'publish_year' => rand(2018, 2022)
                ])
                ->hasAttached(Region::all()->random())
                ->hasAttached(Category::all()->random(3))
                ->hasAttached(Actor::all()->random(rand(1, 5)))
                ->hasAttached(Director::all()->random(1))
                ->hasAttached(Tag::all()->random(5))
                ->has(Episode::factory(5)->state([
                    'server' => 'Vietsub #1',
                    'type' => 'embed',
                    'link' => 'https://aa.nguonphimmoi.com/20220309/2918_589b816d/index.m3u8'
                ]))
                ->create();
        }
    }
}
