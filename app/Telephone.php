<?php

namespace projetoweb2;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
	protected $table = 'telephones';
    protected $fillable = [
        'ddi',
        'ddd',
        'telephone'
    ];

    public function user(){
        return $this->belongsTo('projetoWeb2\User');
    }
}
