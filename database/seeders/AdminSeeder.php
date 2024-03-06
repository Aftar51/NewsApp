<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make account for admin
        // membuat akun admin
        // pada table users
        // menggunakan model User
        $admin = new \App\Models\User;
        // membuat akun admin dengan nama Admin
        $admin->name = 'Admin';
        // membuat akun admin dengan email admin@gmail
        $admin->email = 'admin@gmail.com';
        // membuat akun admin dengan role admin
        $admin->role = 'admin';
        // membuat akun admin dengan password admin
        $admin->password = bcrypt('admin');
        // menyimpan akun admin
        $admin->save();
    }
}
