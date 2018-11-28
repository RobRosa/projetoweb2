<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Telephone;
use Illuminate\Support\Facades\Auth;
use projetoweb2\Address;

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
            'image'         => $user->image,
            'telephones'    => Telephone::where('user_id', $user->id)->get(),
            'address'       => Address::find($user->id)
        ];

        return view('home', [
            'userInfo' => $userInfo
        ]);
    }

    public function showUpdate(Request $request){
        $user = Auth::user();

        $userInfo = [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'cpf'           => $user->cpf,
            'nascimento'    => $user->data_nascimento,
            'sexo'          => $user->sexo,
            'image'         => $user->image,
            'telephones'    => Telephone::where('user_id', $user->id)->get(),
            'address'       => Address::find($user->id)
        ];
        // dd($request->session()->get('warning'));

        return view('perfilUpdate', [
            'userInfo' => $userInfo
        ])->with('warning', $request->session()->get('warning'));
    }

    public function updateSave(Request $request){
        $user = Auth::user();
        $user->name            = $request["name"];
        $user->email           = $request["email"];
        $user->data_nascimento = $request["nascimento"];
        $user->sexo            = $request["sexo"];


        if ($request["imageUp"]) {
            $image = $request->file("imageUp");
            $imageName = $user->id . '-' . round(microtime(true)) . '-Perfil.' . $image->getClientOriginalExtension();
            $image->storeAs('user', $imageName);
            $user->image = $imageName;
        }

        $telephone = Telephone::where('user_id', $user->id)->first();
        $telephone->ddd       = $request["ddd"];
        $telephone->telephone = $request["telephone"];
        
        if ($request["address"] && $request["cep"]) {
            $address = Address::where('user_id', $user->id)->first() ?? new Address;
            $address->user_id     = $user->id;
            $address->endereco    = $request["address"];
            $address->cep         = $request["cep"];
            $address->numero      = $request["numero"];
            $address->bairro      = $request["bairro"];
            $address->cidade      = $request["cidade"];
            $address->estado      = $request["estado"];
            $address->complemento = $request["complemento"];

            $address->save();
        }

        $user->save();
        $telephone->save();

        return redirect()->route('perfil');
    }
}
