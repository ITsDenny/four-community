<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin/user.index');
    }
     
    public function getUserForm()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
      $data = [
        'nama' => $request->nama,
        'email' => $request->email
      ];

      $save = User::insert($data);

      if (!$save) {
        return redirect('admin/member-list')->with('error', 'Failed update data!');
    } else {
        return redirect('admin/member-list')->with('success', 'Data updated successfully!');
    }
    }

}
