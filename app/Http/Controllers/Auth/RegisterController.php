<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/email/verify";

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

        $campos=[
            'usuario'=>['required','string','min:2','max:30','regex:/^[a-zA-Z0-9]+$/', Rule::unique('users', 'usuario')],
            'nombre'=>['required','string','min:2','max:30','regex:/^[a-zA-Z ]+$/'],
            'apellidos'=>['required','string','min:2','max:70','regex:/^[a-zA-Z ]+$/'],
            'email'=>['required','string','max:50','regex:/^([a-zA-Z0-9.])+(@{1})+([a-zA-Z0-9]{2,30})+(\.[a-zA-Z0-9]{2,3}){1}$/',Rule::unique('users', 'email')],
            'telefono'=>['required','string','max:9','min:9','regex:/^(6|7|9)+([0-9]{8})/',Rule::unique('users', 'telefono')],
            'password'=>['required','string','confirmed','max:100',Password::min(8)->mixedCase()->numbers()],
            // 'confirmarPassword'=>['required','string','max:100',Password::min(8)->mixedCase()],
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'min' => 'El campo :attribute debe tener como minimo :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'regex' => 'El campo :attribute no tiene un formato adecuado',
            'usuario.regex'=>'El usuario unicamente debe tener caracteres alfanumericos',
            'nombre.regex'=>'El nombre solo puede contener letras',
            'apellidos.regex'=>'los apellidos solo puede contener letras',
            'email.regex' => 'El email debe tener el siguiente formato: (mikel@example.net)',
            'telefono.regex' => 'El numero de telefono debe ser unicamente numerico y empezar por los numeros 6, 7 o 9',
            'confirmed' => 'Las contraseñas deben coincidir entre si',
            'email.unique' => 'el campo :attribute esta siendo utilizado por otro usuario'
            
        ];


        return Validator::make($data, $campos, $mensaje);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'usuario' => $data['usuario'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
