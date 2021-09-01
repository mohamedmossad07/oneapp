<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class BackendLogin extends Controller
{
    private const PROVIDER_LEVEL = 'provider';
    private const ADMIN_LEVEL = 'admin';

    public function view_login($level)
    {
        return response()->view('auth.login', compact('level'));
    }

    public function login(LoginRequest $request, $level)
    {
        //        check if user is admin or provider
        if (strtolower($level) == self::PROVIDER_LEVEL || strtolower($level) == self::ADMIN_LEVEL) {
            $status = $this->loginAsAdminOrProvider($request->only(['email', 'password']), $level);
            return $status ? $this->redirectAdminAndProvider($level) : back()->with(['email' => 'email or password wrong']);
        }
//         return error unauthorized
        return abort(403);
    }

    private function loginAsAdminOrProvider($credentials = [], $level)
    {
        return Auth::guard($level)->attempt($credentials);//return true if credentials correct other false
    }

    private function redirectAdminAndProvider($level)
    {
        if (strtolower($level) == self::ADMIN_LEVEL) {//---check if user level is admin redirect him to dashboard
            return redirect()->route('dashboard.admin.home');
        }
//        redirect provider to his dash
        return redirect()->route('dashboard.provider.home');
    }
}
