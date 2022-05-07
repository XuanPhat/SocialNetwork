<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     Post::create([
    //         'user_id'=> 2,
    //         'text' => 'com ao mac asdasdsadasd',
    //         'image'=>'image.jpg'
    //     ]);
    //     Post::create([
    //         'user_id'=> 2,
    //         'text' => 'tinh yeu du lon',
    //         'image'=>'image.jpg'
    //     ]);

        // Post::create([
        //     'user_id'=>3,
        //     'text' => 'tam trang phat buon',
        //     'image'=>'image.jpg'
        // ]);
        // Post::create([
        //     'user_id'=>3,
        //     'text' => 'tam trang khong duoc vui',
        //     'image'=>'image.jpg'
        // ]);

        Post::create([
            'user_id'=>3,
            'text' => 'chia tay',
            'image'=>'image.jpg'
        ]);
    }
}
