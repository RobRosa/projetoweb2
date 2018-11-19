<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
	public $timestamp = true;
    protected $fillable = ['name','card','expiration'];
}