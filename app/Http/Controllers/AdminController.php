<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Http\Responses\LoginResponse;
use App\Services\AdminLogin;
class AdminController extends Controller
{

    protected $guard;
    protected $login;

    public function __construct(StatefulGuard $guard, AdminLogin $login)
    {
        $this->guard = $guard;
        $this->login = $login;
    }

    public function index(){
        return view('auth.admin-login',['guard' => 'admin']);
    }

    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    public function store(LoginRequest $request)
    {
        return $this->login->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}

