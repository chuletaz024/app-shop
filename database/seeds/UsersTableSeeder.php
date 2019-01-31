<?php

use Illuminate\Database\Seeder;
Use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Alan',
            'email'=>'chuleton024@gmail.com',
            'password'=>bcrypt('halo0240'),
            'admin'=>true

        ]);
        
    }
}
