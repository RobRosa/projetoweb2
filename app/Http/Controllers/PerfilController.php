<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(){
    	return view('perfil/perfil');
    }
}
