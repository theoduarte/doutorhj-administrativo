<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* if (User::count() == 0) {
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
    	} */
    	
    	if(DB::table('users')->get()->count() == 0){
    	    
    	    DB::table('users')->insert([
    	        
    	        [
    	            'name'           => 'admin',
    	            'email'          => 'admin@comvex.com.br',
    	            'password'       => bcrypt('@prev'),
    	            'remember_token' => str_random(60),
    	            'tp_user'	     => 'ADM',
    	            'cs_status'	     => 'A',
    	            'avatar'          => 'users/default.png',
    	            'perfiluser_id' => 1
    	        ],
    	        [
    	            'name'           => 'Theogenes Ferreira Duarte',
    	            'email'          => 'theo@comvex.com.br',
    	            'password'       => bcrypt('1234'),
    	            'remember_token' => str_random(60),
    	            'tp_user'	     => 'O',
    	            'cs_status'	     => 'A',
    	            'avatar'          => 'users/default.png',
    	            'perfiluser_id' => 2
    	        ],
    	        [
    	            'name'           => 'Cleisson Pessoa',
    	            'email'          => 'cleisson.pessoa@prevservice.com.br',
    	            'password'       => bcrypt('U3KqyD'),
    	            'remember_token' => str_random(60),
    	            'tp_user'	     => 'O',
    	            'cs_status'	     => 'A',
    	            'avatar'          => 'users/default.png',
    	            'perfiluser_id' => 4
    	        ],
    	        [
    	            'name'           => 'Raquel Sousa',
    	            'email'          => 'raquel@prevservice.com.br',
    	            'password'       => bcrypt('DFef4N'),
    	            'remember_token' => str_random(60),
    	            'tp_user'	     => 'O',
    	            'cs_status'	     => 'A',
    	            'avatar'          => 'users/default.png',
    	            'perfiluser_id' => 4
    	        ]
    	        
    	    ]);
    	    
    	}
    }
}
