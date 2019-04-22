<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'password' => 'required|string|max:255|min:3',
        ]);

        $pasword = $request->password;
        $name = $request->name;

        if (User::where('name', $name)->count()) {
            if (Auth::attempt(['name' => $name, 'password' => $pasword])) {
                $responseData = ['alert_class' => 'success', 'message' => "Вы вошли как {$name}"];
            } else {
                $responseData = ['alert_class' => 'danger', 'message' => "Неверный пароль"];
            }
        } else {
            $user = User::create(['name' => $name, 'password' => Hash::make($pasword)]);
            Auth::login($user);
            $responseData = ['alert_class' => 'success', 'message' => "Вы зарегистрировались как {$name}"];
        }

        return redirect()->route('home')->with($responseData);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
