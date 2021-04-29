<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create(['title' => 'Action', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis nisi ante, in vulputate tellus volutpat quis. Pellentesque rhoncus lobortis neque, eu mattis diam vulputate nec. Ut eget orci eleifend, iaculis lorem lacinia, vestibulum mi. Integer nec ultricies nulla. Duis iaculis porta quam, ac ultricies purus aliquam at. Suspendisse at lacinia mi. Nullam ultrices sem velit, vel rhoncus risus sollicitudin a. Nulla facilisi. Ut vulputate viverra gravida. Donec in condimentum ligula, ut auctor nulla.', 'user_id' => 1]);
        Category::create(['title' => 'Drama', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis nisi ante, in vulputate tellus volutpat quis. Pellentesque rhoncus lobortis neque, eu mattis diam vulputate nec. Ut eget orci eleifend, iaculis lorem lacinia, vestibulum mi. Integer nec ultricies nulla. Duis iaculis porta quam, ac ultricies purus aliquam at. Suspendisse at lacinia mi. Nullam ultrices sem velit, vel rhoncus risus sollicitudin a. Nulla facilisi. Ut vulputate viverra gravida. Donec in condimentum ligula, ut auctor nulla.', 'user_id' => 1]);
        Category::create(['title' => 'Horror', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis nisi ante, in vulputate tellus volutpat quis. Pellentesque rhoncus lobortis neque, eu mattis diam vulputate nec. Ut eget orci eleifend, iaculis lorem lacinia, vestibulum mi. Integer nec ultricies nulla. Duis iaculis porta quam, ac ultricies purus aliquam at. Suspendisse at lacinia mi. Nullam ultrices sem velit, vel rhoncus risus sollicitudin a. Nulla facilisi. Ut vulputate viverra gravida. Donec in condimentum ligula, ut auctor nulla.', 'user_id' => 1]);
        Category::create(['title' => 'Documentaries', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis nisi ante, in vulputate tellus volutpat quis. Pellentesque rhoncus lobortis neque, eu mattis diam vulputate nec. Ut eget orci eleifend, iaculis lorem lacinia, vestibulum mi. Integer nec ultricies nulla. Duis iaculis porta quam, ac ultricies purus aliquam at. Suspendisse at lacinia mi. Nullam ultrices sem velit, vel rhoncus risus sollicitudin a. Nulla facilisi. Ut vulputate viverra gravida. Donec in condimentum ligula, ut auctor nulla.', 'user_id' => 1]);
    }
}
