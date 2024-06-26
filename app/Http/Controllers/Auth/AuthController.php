<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        protected Member $memberModel
    ) {
        $this->memberModel = $memberModel;
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:members,email',
                'password' => 'required|min:8'
            ]
        );

        $user = $this->memberModel->where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('id', $user->id);

                return redirect('/admin');
            } else {
                return back()->with('failed', "password does'nt match!");
            }
        } else {
            return back()->with('failed', "email not registered!");
        }
    }

    public function getLoginForm()
    {
        return view('admin.admin_login');
    }
}
