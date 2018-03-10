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
    	if (User::count() == 0) {
    		User::create([
    				'name'           => 'admin',
    				'email'          => 'admin@comvex.com.br',
    				'password'       => bcrypt('@prev'),
    				'remember_token' => str_random(60),
					'tp_user'	     => 'ADM',
					'cs_status'	     => 'A',
    		        'avatar'          => 'users/default.png',
    		        'perfiluser_id' => 1
    		]);
    	}
    }
}
