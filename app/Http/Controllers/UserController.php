<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected User $userModel
    ) {
        $this->userModel = $userModel;
    }

    public function store(Request $request)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email
        ];
    }

    public function getUserForm()
    {
    }
}
