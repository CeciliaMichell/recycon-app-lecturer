<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> "admin",
            'email'=> "admin@gmail.com",
            'password'=>bcrypt("admin123"),
            'role'=>"admin"]);

        User::create(
            [
                'name'=> "customer",
                'email'=> "customer@gmail.com",
                'password'=>bcrypt("customer123"),
                'role'=>"customer"]);
    }
}
