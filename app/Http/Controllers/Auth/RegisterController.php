<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Typology;
use illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'reference_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'vat_number' => ['required', 'string', 'size:11', 'unique:users'],
            'image' => ['required', 'mimes:jpeg,jpg,bmp,svg,png,tiff']
        ]);
    }
    
    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
    protected function create(array $data)
    {
        if (request()->hasFile('image')) {
            $imageupload = request()->file('image');
            $imagename = time() . '.' . $imageupload->getClientOriginalExtension();
            $imagepath = public_path('/img/restaurants/');
            $imageupload->move($imagepath, $imagename);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'reference_name' => $data['reference_name'],
                'address' => $data['address'],
                'image' => $imagename,
                'vat_number' => $data['vat_number'],
                'typologies' => $data['typologies']
            ]);
        }

        $user->typologies()->sync($data['typologies']);

        return $user;
    }
    
    public function showRegistrationForm() {
        $typologies = Typology::all();
        return view('auth.register', compact('typologies'));
    }
}
