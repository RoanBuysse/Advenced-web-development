<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $users_one = new User();
        $users_one->role_id = '1';
        $users_one->name = 'Admin';
        $users_one->email = 'Admin@gmail.com';
        $users_one->password = bcrypt('Admin');
        $users_one->save();


        $users_one = new User();
        $users_one->name = 'Subscriber';
        $users_one->email = 'Subscriber@gmail.com';
        $users_one->password = bcrypt('Subscriber');
        $users_one->save();
    }
}
