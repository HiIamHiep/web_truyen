<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\RegisteringRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user = User::query()
            ->where('email', $data->getEmail())
            ->first();
        $checkExist = true;

        if(is_null($user))
        {
            $user = new User();
            $user->email = $data->getEmail();
            $checkExist = false;
        }

        $user->name = $data->getName();
        $user->avatar = $data->getAvatar();
        $user->save();

        $role = strtolower(UserRoleEnum::getKeys($user->role)[0]);

        Auth::guard($role)->attempt([
           'email' => $user->email,
           'password' => $user->password,
        ]);

        Auth::login($user);

        if($checkExist)
        {
            $role = strtolower(UserRoleEnum::getKey($user->role));
            return redirect()->route("$role.welcome");
        } else {
            return redirect()->route('register');
        }

    }

    public function registering(RegisteringRequest $request)
    {

        $password = Hash::make($request->get('password'));

        // validate kiểm tra auth và không auth
        if(auth()->check()){
            User::query()->where('id', auth()->user()->id)
                ->update([
                    'password' => $password,
                ]);
        } else {
//            dd($request->input('name'));
            $user = User::query()
                ->create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $password,
                ]);

            Auth::login($user);

        }

        return redirect()->route('welcome');

    }
}
