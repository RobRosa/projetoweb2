<?php

namespace projetoWeb2;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','brand','color','price','amount'];
}
