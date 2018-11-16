<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['name','card','expiration'];
}
