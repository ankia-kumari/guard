<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_data = [
            'name' => 'ankia',
            'email' => 'ankiakumari.ca@gmail.com',
            'password' => Hash::make('123'),
        ];

        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('admins')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        if(!Admin::create($admin_data)) {
            dd('failed to insert'); // dump and die
        }
    }
}
