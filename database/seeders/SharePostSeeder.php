<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SharePost;
class SharePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SharePost::create([
        //     'user_id' => 1,
        //     'post_id' => 19,
        // ]);
        SharePost::create([
            'user_id' => 3,
            'post_id' => 4,
        ]);
    }
}
