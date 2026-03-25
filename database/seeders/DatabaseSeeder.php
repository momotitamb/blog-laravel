<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Пользователи
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('11111111'),
        ]);
        User::factory(4)->create([
            'password' => bcrypt('11111111'),
        ]);

        // Категории
        $categories = ['PHP', 'Laravel', 'JavaScript', 'DevOps', 'Базы данных'];
        foreach ($categories as $name) {
            Category::create(['name' => $name, 'description' => fake()->sentence()]);
        }

        // Теги
        $tags = ['beginner', 'advanced', 'tutorial', 'tips', 'best-practices'];
        foreach ($tags as $name) {
            Tag::create(['name' => $name]);
        }

        // Посты — привязываем к случайным пользователям и категориям
        Post::factory(5)->create([
            'user_id' => fn() => User::inRandomOrder()->first()->id,
            'category_id' => fn() => Category::inRandomOrder()->first()->id,
        ]);
    }
}
