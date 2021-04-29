<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->insert([
        //    'name' => Str::random(10),
        //    'email' => Str::random(10).'@gmail.com',
        //    'password' => Hash::make('password'),
	//]);
        User::create(['name' => 'Admin', 'email' => 'admin@nurflixtv.com', 'password' => bcrypt('admin'), 'role' => 'admin']);
        User::create(['name' => 'Editor', 'email' => 'editor@nurflixtv.com', 'password' => bcrypt('editor'), 'role' => 'editor']);

    }

}
