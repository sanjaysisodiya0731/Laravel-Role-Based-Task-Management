<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(User::count() == 0){
            $users = [
                [
                    'first_name'=>'admin',
                    'last_name'=>'admin',
                    'email'=>'admin@example.com',
                    'password'=> bcrypt('12345678'),
                    'role' =>'admin'
                ],
            ];
            foreach($users as $user){
                User::create($user);
            }
        }
    }
}
