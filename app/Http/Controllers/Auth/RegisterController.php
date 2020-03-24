<?php

namespace App\Http\Controllers\Auth;

use Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/register';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:8'],
            'address' => ['required', 'string', 'max:70'],
            'CP' => ['required', 'string', 'max:5'],
            'city' => ['required', 'string', 'max:30'],
            'hiring_date' => ['required', 'date'],
            'role' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'login' => $this->createLogin($data['first_name'], $data['last_name']),
            'address' => $data['address'],
            'CP' => $data['CP'],
            'city' => $data['city'],
            'hiring_date' => $data['hiring_date'],
            'role' => $data['role']
        ]);
    }

    /**
     * Create a user login.
     *
     * @param  string $first_name
     * @param  string $last_name
     * @return string
     */

    private function createLogin($first_name, $last_name)
    {
        $first_letter = substr(strtolower($last_name), 0, 1);
        $first_name = strtolower($first_name);

        return $first_letter.$first_name;
    }

}
