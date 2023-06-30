<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'post_user_id'=>1,
            'approved_user_id'=>1,
            'is_active'=>1,
            'title'=>'Sport',
            'image'=>'1598588380.png',
            'blog_category_id'=>1,
            'description'=>'This is description',
            'deleted'=>1
        ]);
        Blog::create([
            'post_user_id'=>2,
            'approved_user_id'=>1,
            'is_active'=>1,
            'title'=>'Construction',
            'image'=>'1598588107.png',
            'blog_category_id'=>2,
            'description'=>'This is description',
            'deleted'=>1
        ]);
        Blog::create([
            'post_user_id'=>3,
            'approved_user_id'=>1,
            'is_active'=>1,
            'title'=>'Architecture',
            'image'=>'1598588380.png',
            'blog_category_id'=>3,
            'description'=>'This is description',
            'deleted'=>1
        ]);
    }
}
