<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            [
                'level_name' => 'administrator',
            ],
            [
                'level_name' => 'peminjam'
            ]
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admim@mail.com',
            'level' => 1,
            'password' => bcrypt('12345678'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
