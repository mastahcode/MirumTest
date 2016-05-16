<?php

use Illuminate\Database\Seeder;

class TableSeedOke extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([
            'title'     =>  'administrator',
            'slug'      =>  'admin',
        ]);

        DB::table('roles')->insert([
            'title'     =>  'user biasa',
            'slug'      =>  'user',
        ]);
        DB::table('users')->insert([
            'nama'   =>     'waviq subhi',
            'username'  =>  'waviq',
            'email'     =>  'waviq.subkhi@gmail.com',
            'password'  =>  bcrypt('waviq'),
            'role_id'   =>  1,
        ]);

        DB::table('category')->insert([
            'nameCategory'     =>  'Programming',
        ]);
        DB::table('category')->insert([
            'nameCategory'     =>  'Politik',
        ]);
    }
}
