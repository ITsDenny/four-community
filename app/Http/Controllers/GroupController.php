<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;


class GroupController extends Controller
{
    public function __construct(
        protected Group $groupModel
    ) {
        $this->groupModel = $groupModel;
    }

    public function GroupForm()
    {
        return view("admin.group.add_group_form");
    }

    public function store(Request $request)
    {
       
        $data = [
            'name' => $request->name,
            'status' => true
        ];

        $save = $this->groupModel->insert($data);

        if (!$save) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/group-list')->with('success', 'Data deleted successfully');
        

    }
    public function update(Request $request, $id)
    {
       $data =[
            'name' => $request->name,
            'status' => true
       ];
        $save = $this->groupModel->where('id', $id)->update($data);
        if (!$save) {
            return redirect('admin/group-list')->with('error', 'Failed update data!');
        } else {
            return redirect('admin/group-list')->with('success', 'Data updated successfully!');
        }
    }
    public function delete($id)
    {
        $delete = $this->groupModel->where('id', $id)->delete();

        if (!$delete) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/group-list')->with('success', 'Data deleted successfully');
    }
    public function getGroup()
    {
        $data=$this->groupModel->get();

        return view('admin.group_table', compact('data'));
    }

    public function getOne($id)
    {
        $level = $this->groupModel->where('id', $id)->first();

        return view('admin.group_table', compact('level'));
    }
}
