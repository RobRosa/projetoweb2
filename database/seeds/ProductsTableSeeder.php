<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    private static $qtdProducts = 50;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function getProdString($qtdPalavras){
    	$desc = '';
    	for ($i=0; $i < $qtdPalavras; $i++) { 
    		$desc .= trim(str_random(mt_rand(1, 20))) . ' ';
    	}

    	return $desc;
    }

    private function getCategory(){
        $cat = ['Eletrônicos','Brinquedos','Roupas','Livros','Eletrodomésticos','Esportes'];
        return $cat[rand(0, sizeof($cat) - 1)];
    }

    public function run()
    {
    	$arrProducts = [];

    	for($i = 0; $i < self::$qtdProducts; $i++){
    		$priceCents = mt_rand(0, 99);
    		$product = [
        		'name' 			=> $this->getProdString(random_int(1, 4)),
		        'description' 	=> $this->getProdString(random_int(1, 15)),
		        'brand' 		=> str_random(random_int(1, 15)),
		        'color' 		=> str_random(random_int(1, 20)),
		        'price' 		=> mt_rand(1, 10000) + ($priceCents > 0 ? $priceCents / 100 : 0),
				'amount' 		=> random_int(0, 1000),
                'category'      => $this->getCategory()
        	];

        	array_push($arrProducts, $product);
    	}

        DB::table('products')->insert($arrProducts);
    }
}
