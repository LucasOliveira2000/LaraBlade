<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view("User.login",[
            "title"     => "Login",
            "user"      => [
                "email"     => "",
                "password"  => ""
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("User.create",[
            "title"     => "Registro",
            "user"      => [
                "name"      => "",
                "email"     => "",
                "password"  => ""
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logar(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ], [
            'email.required'    => 'O campo email é obrigatório.',
            'email.email'       => 'Formato de email é invalido.',
            'password.required' => 'O campo senha é obrigatório.'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return to_route("list.index")->with("message", "Bem vindo ". Auth::user()->name);
        }else{
            return to_route("user.login")->with("message", "Usuário ou Senha incorretos");
        }
    }

    /**
     * Display the specified resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:60|min:4',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|max:60|min:8',
        ], [
            'name.required'     => 'O campo nome é obrigatório.',
            'name.max'          => 'O campo nome tem que ter no máximo 60 caracteres.',
            'name.min'          => 'O campo nome tem que ter no minimo 4 caracteres',
            'email.required'    => 'O campo email é obrigatório.',
            'email.unique'      => 'O email já está em uso.',
            'email.email'       => 'O Formato do email é invalido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.max'      => 'O campo senha tem que ter no máximo 60 caracteres.',
            'password.min'      => 'O campo senha tem que ter no minimo 8 letras, simbolos ou numeros.'
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $userEmail = User::where('email', $request->email)->first();

        if ($userEmail) {
            return redirect()->back()->with("message",'Email já cadastrado!');
        }

        $user = User::create($userData);

        Auth::login($user);
        $request->session()->regenerate();

        return to_route("list.index")->with("message","Bem vindo ". $user->name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route("site.home")->with("message", "Deslogado com sucesso!");
    }
}
