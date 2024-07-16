<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(
        protected Member $memberModel,
        protected Level $levelModel
    ) {
        $this->memberModel = $memberModel;
        $this->levelModel = $levelModel;
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'status' => true,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'picture' => 'asset_url'
        ];


        $save = $this->memberModel->create($data);

        if (!$save) {
            return redirect('member/add-member')->with('error', 'Failed insert data!');
        } else {
            return redirect('member/add-member')->with('success', 'Data added successfully!');
        }
    }

    public function memberForm()
    {
        $levels = $this->levelModel->get();

        return view('admin.member.add_member_form', compact('levels'));
    }

    public function delete($id)
    {
        $delete = $this->memberModel->where('id', $id)->delete();

        if (!$delete) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/member-list')->with('success', 'Data deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|min:3',
            'nik' => 'nullable|string',
            'gender' => 'nullable',
            'birth_date' => 'nullable|string|date_format:Y-m-d',
            'place_of_birth' => 'nullable|string|min:6',
            'address' => 'nullable|string|min:10',
            'level_id' => 'nullable|exists:level,id',
            'email' => 'unique:App\Models\Member,email'
        ]);

        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'status' => true,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'picture' => 'asset_url'
        ];


        $save = $this->memberModel->create($data);

        if (!$save) {
            return redirect('admin/member-list')->with('error', 'Failed update data!');
        } else {
            return redirect('admin/member-list')->with('success', 'Data updated successfully!');
        }
    }

    public function getOne($id)
    {
        $member = $this->memberModel->where('id', $id)->first();

        return view('admin.member_table', compact('member'));
    }
}
