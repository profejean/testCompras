<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;

class UsuarioController extends Controller
{
    public function inicio(){
        $productos = Producto::all();
        $compras = Compra::where('status','pendiente')->get();
        $facturas = Factura::all();
        return view('home', compact('compras','productos','facturas'));
    }

     public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


                return Redirect::route('inicio');

        }

        return back()->withErrors([
            'email' => 'Los datos enviados no se reconocen en el sistema.',
        ]);
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        try {

        DB::beginTransaction();

        $user = new User();
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->rol = 'cliente';
        $user->password = bcrypt($credentials['password']);
        $user->save();

        $data = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],

        ];

            if (Auth::attempt($data)) {
                $request->session()->regenerate();
            }

        } catch (\Exception $e) {

            \DB::rollBack();

            return back()->withErrors([
            'email' => 'Hubo un problema al crear su usuario por favor intentelo nuevamente'
            ]);

        }


        return redirect()->back()->with('success', 'Su compra ha sido exitosa');
    }



}
