<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(
        protected Member $memberModel
    ) {
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
            'tatus' => 'nullable|boolean',
            'level_id' => 'required|exists:level,id',
            'email' => 'required|email',
        ]);

        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'tatus' => true,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'picture' => 'asset_url'
        ];
        $save = $this->memberModel->create($data);

        if (!$save) {
            session()->flash('error', 'Failed insert data!');
        } else {
            session()->flash('success', 'Data added successfully!');
        }

        return redirect('member/add-member');
    }

    public function memberForm()
    {
        return view('admin.member.add_member_form');
    }

    public function delete($id)
    {
        $delete = $this->memberModel->where('id', $id)->delete();

        if (!$delete) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/member-list')->with('success', 'Data deleted successfully');
    }

    public function update($id)
    {
    }
}
