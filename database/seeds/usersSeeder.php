<?php

use App\User;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            //'user' => 'RHAF',
            'name' => 'Ricardo H. Arias Fernández',
            'email' => 'RHAF05@hotmail.com',
            'password' => bcrypt('1234'),
            //'estado' => '1',
            'ciudad_id' => 398,
        ]);
    }
}
