<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(protected LoginService $loginService) {
    }

    function getLoginPage() : View {
        return view('admin/login');
    }

    function login(LoginRequest $request) : RedirectResponse {
       if ($this->loginService->login($request->validated())) {
            $userRole = auth()->user()->role;
            if ($userRole === UserRoleEnum::ADMIN ) {
                return to_route('admin.dashboard');
            }
            if ($userRole === UserRoleEnum::DEPARTMENT_OFFICER ) {
                return to_route('department.dashboard');
            }
            if ($userRole === UserRoleEnum::DEAN ) {
                return to_route('dean.dashboard');
            }
            if ($userRole === UserRoleEnum::LECTURER ) {
                return to_route('lecturer.dashboard');
            }
            else{
                dd($userRole);
            }
       }
       return redirect()->back()->withErrors(['password' => 'Invalid password']);
    }

    function logout() : RedirectResponse {
        Auth::logout();
        return to_route('login');
    }
}
