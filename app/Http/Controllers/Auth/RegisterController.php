<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserAddress;
use App\UserCar;
use App\CurrentCode;
use App\ExceptCode;
use App\Http\Controllers\Controller;
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
        if($data['email'] != null){
            return Validator::make($data, [

                'email' => 'string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }
        else{
            return Validator::make($data, [

                'password' => 'required|string|min:6|confirmed',
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */




    protected function create(array $data)
    {




        if($data['day'] != null && $data['month'] != null && $data['year'] != null){

            $newDate = $data['year'].'-'.$data['month'].'-'.$data['day'];
        }
        else{
            $newDate = null;
        }

        $currentCode = CurrentCode::orderBy('id', 'desc')->first()->current_code;


        if ($currentCode >= 1 && $currentCode < 9) {
            $userCode = '000' . ($currentCode + 1);

        } elseif ($currentCode >= 9 && $currentCode < 99) {
            $userCode = '00' . ($currentCode + 1);

        } elseif ($currentCode >= 99 && $currentCode < 999) {
            $userCode = '0' . ($currentCode + 1);

        } elseif ($currentCode >= 999 && $currentCode < 9999) {
            $userCode = $currentCode + 1;

        }


        while(1) {

            $checkUserCode = User::where('code', '=', $userCode)->first();

            if (!empty($checkUserCode)) {

                $userCode = ltrim($checkUserCode->code, '0');


                if ($userCode >= 1 && $userCode < 9) {
                    $userCode = '000' . ($userCode + 1);

                } elseif ($userCode >= 9 && $userCode < 99) {
                    $userCode = '00' . ($userCode + 1);

                } elseif ($userCode >= 99 && $userCode < 999) {
                    $userCode = '0' . ($userCode + 1);

                } elseif ($userCode >= 999 && $userCode < 9999) {
                    $userCode = $userCode + 1;

                }

            }
            else{


                while (1){

                    $checkExceptCode = ExceptCode::where('except_code', '=', $userCode)->first();


                    if(!empty($checkExceptCode)){

                        $userCode = ltrim($userCode, '0');


                        if ($userCode >= 1 && $userCode < 9) {
                            $userCode = '000' . ($userCode + 1);
                            break;
                        } elseif ($userCode >= 9 && $userCode < 99) {
                            $userCode = '00' . ($userCode + 1);
                            break;
                        } elseif ($userCode >= 99 && $userCode < 999) {
                            $userCode = '0' . ($userCode + 1);
                            break;
                        } elseif ($userCode >= 999 && $userCode < 9999) {
                            $userCode = $userCode + 1;
                            break;
                        }

                    }
                    else{

                        return User::create([
                            'code' => $userCode,
                            'title_name' => $data['title_name'],
                            'first_name' => $data['first_name'],
                            'last_name' => $data['last_name'],
                            'nick_name' => $data['nick_name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                            'role' => 'WHITE MEMBER',
                            'gender' => $data['gender'],
                            'birthday' => $newDate,
                            'telephone' => $data['telephone'],
                            'facebook' => $data['facebook'],
                            'line_id_type' => $data['line_id_type'],
                            'line_id' => $data['line_id'],

                        ]);
                    }

                }
            }
        }








    }
}
