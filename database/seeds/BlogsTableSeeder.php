<?php

use Illuminate\Database\Seeder;

use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_one = new Blog();
        $blog_one->title = 'This is the title of my first blog';
        $blog_one->body = 'This is the body of my first blog. This is the body of my first blog.';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'This is the title of my second blog';
        $blog_two->body = 'This is the body of my second blog. This is the body of my second blog.';
        $blog_two->save();

        
    }
}
