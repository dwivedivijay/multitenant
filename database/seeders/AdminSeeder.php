<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Helper::encryptPassMd5('admin@1234');
        AdminLogin::create([
            'name'=>'SuperAdmin',
            'email'=>'superadmin@admin.com',
            'password'=> $password,
            'status'=>1,
            'is_admin'=>1,
        ]);
    }
}
