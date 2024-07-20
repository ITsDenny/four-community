<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    public function __construct(
        protected User $userModel,
        protected Member $memberModel,
        protected Group $groupModel
    ) {
        $this->userModel = $userModel;
        $this->memberModel = $memberModel;
        $this->groupModel = $groupModel;
    }

    public function store(Request $request)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'member_id' => $request->member_id,
            'group_id' => $request->group_id
        ];

        $newUser = $this->userModel->create($user);

        if (!$newUser) {
            return redirect('user/user-table')->with('error', 'Failed store data!');
        } else {
            return redirect('user/user-table')->with('success', 'Data stored successfully!');
        }
    }

    public function getUserForm()
    {
        $members = $this->memberModel->get();
        $groups = $this->groupModel->get();

        return view('admin.user.add_user', compact(['members', 'groups']));
    }

    public function getUserTable()
    {
        $users = $this->userModel->get();

        return view('admin.user.user-table', compact('users'));
    }

    public function delete(int $id)
    {
        return $this->userModel->where('id', $id)->delete();
    }

    public function getOneUser($id)
    {
        $user = $this->userModel->findOrFail($id);

        return view('admin.user.user-table', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'member_id' => $request->member_id
        ];
        $user = $this->userModel->where('id', $id)->update($update);

        if (!$user) {
            return redirect('user/user-table')->with('error', 'Failed update data!');
        } else {
            return redirect('user/user-table')->with('success', 'Data updated successfully!');
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $emailCheck = $this->userModel->where('email', $email)->first();

        if (!$emailCheck) {
            return back()->withErrors(['email' => 'Email not found'])->withInput();
        }

        if (!Hash::check($password, $emailCheck->password)) {
            return back()->withErrors(['password' => 'Invalid password'])->withInput();
        }
        Auth::login($emailCheck);

        return redirect()->intended('admin');
    }
}
