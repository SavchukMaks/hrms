<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Clients;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\DomainParams\Users;

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'company_name' => 'unique:companies,title',
            'first_name'=>'max:64',
            'second_name'=>'max:64',
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
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'User'
        ]);

        if (request('role')==Users::ROLE_COMPANY) {
           Company::create([
                'title' => $data['company_name'],
                'owner_user_id'=> $user->id,
                'company_id'=> 1,
            ]);

        }
        else {
            UserProfile::create([
                'user_id' => $user->id,
                'firstname' => request('first_name'),
                'lastname'=> request('second_name'),
                'birth_date' => '1996/10/07',
            ]);

        }
        return $user;
    }
}
