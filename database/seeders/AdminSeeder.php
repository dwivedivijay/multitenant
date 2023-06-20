<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin@1234');
        User::create([
            'name'=>'SuperAdmin',
            'email'=>'superadmin@admin.com',
            'password'=> $password,
            'status'=>1,
            'is_admin'=>1,
        ]);
    }
}
