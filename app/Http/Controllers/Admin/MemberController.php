<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PictureController;
use App\Models\Level;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(
        protected Member $memberModel,
        protected Level $levelModel,
        protected PictureController $pictureController
    ) {
        $this->memberModel = $memberModel;
        $this->levelModel = $levelModel;
        $this->pictureController = $pictureController;
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
        ];
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $folderName = 'members'; // Set folder name
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $folderPath = storage_path("app/public/$folderName");
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $path = $image->storeAs($folderName, $fileName, 'public');
            $pictureUrl = asset("storage/$folderName/$fileName");

            $data['picture'] = $pictureUrl;
        }

        $save = $this->memberModel->create($data);

        if (!$save) {
            return redirect('member/add-member')->with('error', 'Failed insert data!');
        } else {
            return redirect('admin/member-list')->with('success', 'Data added successfully!');
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
        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'place_of_birth' => $request->place_of_birth,
            'address' => $request->address,
            'status' => true,
            'level_id' => $request->level_id,
        ];
        $save = $this->memberModel->where('id', $id)->update($data);

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

    public function getAllMember()
    {
        $member = $this->memberModel->select('id', 'name')->get();

        return $member;
    }
}
