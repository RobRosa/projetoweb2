<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamp = true;
    protected $fillable = [
    	'name',
    	'description',
    	'brand',
    	'color',
    	'price',
    	'amount',
    	'image_name',
    	'category'
    ];
}
