<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        \Bjora\User::create([
            'username' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password(6),
            'gender' => $faker->randomElement(['Male', 'Female']),
            'role' => $faker->randomElement(['Admin', 'Member']),
            'address' => $faker->address,
            'profile_picture' => 'profile_picture/default.jpg',
            'birthday' => $faker->date('Y-m-d'),
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
