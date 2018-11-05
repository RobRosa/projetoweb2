<?php

namespace projetoweb2\Http\Controllers\Auth;

use projetoweb2\User;
use projetoweb2\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:6|confirmed',
            'cpf'               => 'required|string|digits:11|unique:users',
            'data_nascimento'   => 'required|before:today|after:1900-01-01',
            'sexo'              => 'required|string|min:1|max:1',
            'ddd'               => 'required|string|max:3',
            'telephone'         => 'required|string|min:8'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \projetoweb2\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'cpf'               => $data['cpf'],
            'data_nascimento'   => $data['data_nascimento'],
            'password'          => Hash::make($data['password']),
            'sexo'              => $data['sexo']
        ]);

        // Modificar futuramente! Não acho que essa parte deveria ser feita aqui, mas por hora vai.
        DB::table('telephones')->insert([
            'ddd'       => $data['ddd'],
            'telephone' => $data['telephone'],
            'user_id'   => $user->id
        ]);

        return $user;
    }
}
