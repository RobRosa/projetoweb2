<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoWeb2\Telephone;
use Illuminate\Support\Facades\Auth;
use projetoWeb2\Address;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $userInfo = [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'cpf'           => $user->cpf,
            'nascimento'    => $user->data_nascimento,
            'sexo'          => $user->sexo,
            'telephones'    => Telephone::where('user_id', $user->id)->get(),
            'address'       => Address::find($user->id)
        ];

        return view('home', [
            'userInfo' => $userInfo
        ]);
    }

    public function showUpdate(){
         $user = Auth::user();

        $userInfo = [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'cpf'           => $user->cpf,
            'nascimento'    => $user->data_nascimento,
            'sexo'          => $user->sexo,
            'telephones'    => Telephone::where('user_id', $user->id)->get(),
            'address'       => Address::find($user->id)
        ];

        return view('perfilUpdate', [
            'userInfo' => $userInfo
        ]);
    }
}
