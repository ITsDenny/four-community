<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function __construct(
        protected Level $levelModel
    ) {
        $this->levelModel = $levelModel;
    }

    public function LevelForm()
    {
        return view('admin.level.add_level_form');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $save = $this->levelModel->insert($data);

        if (!$save) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/level-list')->with('success', 'Data deleted successfully');
    }
    public function update(Request $request, $id)
    {
       $data =[
            'name' => $request->name,
            'description' => $request->description,
       ];
        $save = $this->levelModel->where('id', $id)->update($data);
        if (!$save) {
            return redirect('admin/level-list')->with('error', 'Failed update data!');
        } else {
            return redirect('admin/level-list')->with('success', 'Data updated successfully!');
        }
    }
    public function delete($id)
    {
        $delete = $this->levelModel->where('id', $id)->delete();

        if (!$delete) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/level-list')->with('success', 'Data deleted successfully');
    }



    public function getLevel()
    {
        $data=$this->levelModel->get();

        return view('admin.level_table', compact('data'));
    }
    public function getOne($id)
    {
        $level = $this->levelModel->where('id', $id)->first();

        return view('admin.level_table', compact('level'));
    }
    
}
