<?php

namespace projetoWeb2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{

	protected $table 	= 'enderecos';
	protected $fillable = [
		'cep',
		'endereco',
		'numero',
		'complemento',
		'cidade',
		'estado'
	];
	
}
