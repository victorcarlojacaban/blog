<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Auth\CustomUserProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
/*
    public function showLoginForm(){
    
        return view('auth.login');
    }
    
    public function showRegistrationForm(){
        return view('admin.auth.register');
    }*/

        /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    public function postLogin(Request $request)
    {
        $user = new CustomUserProvider;

        $dummy = [
            'id' => 1,
            'name' => 'Victor',
            'email' => 'kobe@yahoo.com',
            'password' => '$2y$10$IK4JnZbTIJKkne0Bcq2XU.lsJ4Tg5AOq8KnjqaC3YsaPVOspPvdFe'

        ];

        $isUser = $user->retrieveById($dummy['id']);

        if ($request->email == $isUser->email)
        {
            return true;
        }
        return false;
    }*/
}
