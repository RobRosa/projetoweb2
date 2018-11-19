<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class ItemSale extends Model
{
	public $timestamp = true;
    protected $fillable = [
    	'amount',
    	'sale_id',
    	'product_id'
    ];
}
