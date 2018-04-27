<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConveniosTableSeeder extends Seeder
{
    public function run()
    {
    	if(DB::table('convenios')->get()->count() == 0){
    	    DB::table('convenios')->insert([
    	        [
    	            'id'           => 1,
    	            'cd_convenio'  => 1080,
    	            'ds_convenio'  => 'Doutorhj',
    	            'cs_status'    => 'A',
    	        ]
    	    ]);
    	    
    	}
    }
}
