<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ivanphyo',
            'email' => 'ivanphyo2015@gmail.com',
            'email_verified_at' => now(),
            'role' => '1',
            'password' => Hash::make('ivan2020'), // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();

        $project_category = ['website','design','photoshop','app'];

        foreach ($project_category as $c){
            DB::table('project_categories')->insert([
                'name' => $c,
            ]);
        };

        $blog_category = ['general','html','css','photoshop','js','php','laravel'];

        foreach ($blog_category as $c){
            DB::table('blog_categories')->insert([
                'name' => $c,
            ]);
        };
    }
}
