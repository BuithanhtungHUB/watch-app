<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->image = 'https://cdn.iconscout.com/icon/free/png-512/boy-avatar-4-1129037.png';
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('111111');
        $user->image = 'https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg';
        $user->role_id = 2;
        $user->save();
    }
}
