<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelephonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('telephones')->insert([
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 1
    		],
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 2
    		],
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 3
    		],
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 4
    		],
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 5
    		],
    		[
    			'ddd' => random_int(11, 99),
    			'telephone' => str_pad(random_int(0, 999999), 10, '0'),
    			'user_id' => 6
    		]
    	]);
    }
}
