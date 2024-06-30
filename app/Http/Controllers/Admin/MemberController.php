<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(protected Member $memberModel)
    {
        $this->memberModel = $memberModel;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'nik' => 'required|string',
            'gender' => 'required',
            'birth_date' => 'required|string|date_format:Y-m-d',
            'place_of_birth' => 'required|string|min:6',
            'address' => 'required|string|min:10',
            'status' => 'nullable|boolean',
            'picture' => 'nullable|string',
            'level_id' => 'required|exist:levels,id',
            'email' => 'required|email',
            // 'password' => 'required|string'
        ]);

        $data = $request->all();
        $save = $this->memberModel->create($data);

        if ($save) {
            return view('admin.member_table');
        } else {
            return back()->with('error', 'Failed insert data!');
        }
    }

    public function memberForm()
    {
        return view('admin.member.add_member_form');
    }
}
