<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = ['css.jpg','database.jpg' ,'html.jpg', 'java.jpg' ,'laravel.png', 'php.jpg'];
        $category = Category::pluck('id')->toArray();
        $option = [0, 1];
        $status = [0];
        $Is_deleted = [1];
        return [
            //
  /*           'user_id' => Auth::factory(), */
            'title' => fake()->text(),
            'sub_title' => fake()->paragraphs(),
            'content' => fake()->sentences(),
            'orders' => fake()->randomDigit(),
            'option' => fake()->randomElement($option),
            'status' => fake()->randomElement($status),
            'Is_deleted' => fake()->randomElement($Is_deleted),
            'image' => 'media/'.fake()->randomElement($image),
            'category_id' =>fake()->randomElement($category),
        ];

    }
    public function configure()
    {
        $tags = Tag::pluck('id')->toArray();
        return $this->afterCreating(function (Post $post) use($tags){
            // ...
            $post->tags()->sync(fake()->randomElements($tags, 2 ));
            // ...
        });
    }
}
