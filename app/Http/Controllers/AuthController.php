<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function loginPage(): View {
        return view("pages.auth.login", [
            "title" => "Login"
        ]);
    }

    function registerPage() : View {
        return view("pages.auth.register", [
            "title" => "Register"
        ]);
    }

    function register(RegisterRequest $request) {
        $payload = $request->validated();

        $userExist = User::firstWhere("email", $payload["email"]);

        if ($userExist) {
            throw new HttpResponseException(response([
                "errors" => [
                    "email" => [
                        "email already registered"
                    ]
                ]
            ], 401));
        }

        $user = new User($payload);
        $user->password = Hash::make($payload["password"]);
        $user->save();

        Alert::success('Register sukses', 'Silahkan login');

        return redirect("/login");
    }

    function login(LoginRequest $request) {
        $payload = $request->validated();

        $user = User::firstWhere("email", $payload["email"]);

        if (!$user || !Hash::check($payload["password"], $user->password)) {
            throw new HttpResponseException(response([
                "errors" => [
                    "email" => [
                        "email or password is wrong"
                    ]
                ]
            ], 401));
        }

        if (Auth::attempt($payload)) {
            $request->session()->regenerate();
            Alert::success('Login sukses', 'Selamat datang kembali');
            return redirect("/");
        }
    }
}
