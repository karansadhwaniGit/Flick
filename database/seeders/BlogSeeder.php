<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\PostDec;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNews= Category::create(['name'=>'News']);
        $categoryTech= Category::create(['name'=>'Tech']);
        $categoryEngineering=Category::create(['name'=>'Engineering']);
        $categoryDesign=Category::create(['name'=>'Design']);

        $tagCustomers= Tag::create(['name'=>'customers']);
        $tagLaravel= Tag::create(['name'=>'laravel']);
        $tagDesign= Tag::create(['name'=>'design']);
        $tagNews= Tag::create(['name'=>'news']);

        $post1=Post::create([
            'title'=>'30 Days of Code!',
            'excerpt'=>Factory::create()->sentence(rand(10,18)),
            'content'=>Factory::create()->paragraphs(rand(3,7),true),
            'image'=>'images/posts/1.jpg',
            'category_id'=>$categoryDesign->id,
            'user_id'=>1,
            'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post2=Post::create([
            'title'=>'Core Java!',
            'excerpt'=>Factory::create()->sentence(rand(10,18)),
            'content'=>Factory::create()->paragraphs(rand(3,7),true),
            'image'=>'images/posts/2.jpg',
            'category_id'=>$categoryEngineering->id,
            'user_id'=>1,
            'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post3=Post::create([
            'title'=>'Changes in Java!',
            'excerpt'=>Factory::create()->sentence(rand(10,18)),
            'content'=>Factory::create()->paragraphs(rand(3,7),true),
            'image'=>'images/posts/3.jpg',
            'category_id'=>$categoryNews->id,
            'user_id'=>2,
            'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post4=Post::create([
            'title'=>'Technologies To learn!',
            'excerpt'=>Factory::create()->sentence(rand(10,18)),
            'content'=>Factory::create()->paragraphs(rand(3,7),true),
            'image'=>'images/posts/1.jpg',
            'category_id'=>$categoryTech->id,
            'user_id'=>2,
            'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post5=Post::create([
            'title'=>'Technologies To learn!',
            'excerpt'=>Factory::create()->sentence(rand(10,18)),
            'content'=>Factory::create()->paragraphs(rand(3,7),true),
            'image'=>'images/posts/5.jpg',
            'category_id'=>$categoryTech->id,
            'user_id'=>1,
            'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post1->tags()->attach([$tagCustomers->id,$tagDesign->id]);
        $post2->tags()->attach([$tagNews->id]);
        $post3->tags()->attach([$tagLaravel->id]);
        $post4->tags()->attach([$tagDesign->id]);
        $post5->tags()->attach([$tagCustomers->id]);
    }
}
