<?php

use Illuminate\Database\Seeder;

class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
	        [
	        	'name' => 'Eletrônicos'
	        ],[
	        	'name' => 'Brinquedos'
	        ],[
	        	'name' => 'Roupas'
	        ],[
	        	'name' => 'Livros'
	        ],[
	        	'name' => 'Eletrodomésticos'
	        ],[
	        	'name' => 'Esportes'
	        ]
    	]);
    }
}
