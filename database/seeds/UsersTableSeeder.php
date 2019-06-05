<?php

use App\User;
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
        (new User([
            'name' => 'Tao BERQUER',
            'email' => 'alexr@gmail.com',
            'password' => bcrypt('test'),
        ]))->save();
    }
}
