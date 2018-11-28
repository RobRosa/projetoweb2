<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
        	[
        		'name' => 'Robson',
        		'email' => 'rob@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '1997-02-17',
        		'sexo' => 'M',
                'admin' => true
        	],
        	[
        		'name' => 'Rodrigo',
        		'email' => 'rodrigo@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '1998-01-01',
        		'sexo' => 'M',
                'admin' => true
        	],
        	[
        		'name' => str_random(10),
        		'email' => 'user@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '2000-01-01',
        		'sexo' => rand(0,1) ? 'M' : 'F',
                'admin' => false
        	],
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '2000-01-01',
        		'sexo' => rand(0,1) ? 'M' : 'F',
                'admin' => false
        	],
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '2000-01-01',
        		'sexo' => rand(0,1) ? 'M' : 'F',
                'admin' => false
        	],
        	[
        		'name' => str_random(10),
        		'email' => str_random(10).'@mail.com',
        		'password' => Hash::make('123456'),
        		'cpf' => str_pad(random_int(0, 999999), 11, '0', STR_PAD_BOTH),
        		'data_nascimento' => '2000-01-01',
        		'sexo' => rand(0,1) ? 'M' : 'F',
                'admin' => false
        	]
        ]);
    }
}
