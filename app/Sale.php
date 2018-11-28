<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	public $timestamp = true;
    protected $fillable = ['price_total'];
}
