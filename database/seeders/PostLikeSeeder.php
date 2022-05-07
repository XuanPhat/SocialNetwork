<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostLike;
class PostLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PostLike = PostLike::where('user_id','=',4)->where('post_id','=',29);
        $PostLike->delete();
    }
}
