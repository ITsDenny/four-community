<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct(
        protected Group $groupModel
    ) {
        $this->groupModel = $groupModel;
    }

    public function addGroupForm()
    {
        return view("add_group_form");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'status' => true
        ];

        $save = $this->groupModel->create($data);

        if (!$save) {
            return redirect('admin/group/add')->with('error', 'Failed insert data!');
        } else {
            return redirect('admin/group/add')->with('success', 'Data added successfully!');
        }

        return view('admin.group.group_table');
    }

    public function getAllGroup()
    {
        $groups = $this->groupModel->get();

        return view('admin.group.group_table', compact('groups'));
    }
}
