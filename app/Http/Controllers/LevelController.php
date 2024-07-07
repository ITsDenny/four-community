<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;




class LevelController extends Controller
{
    
    public function LevelForm(){

        return view('admin.level.add_level_form');
    }

    public function __construct(
        protected Level $levelModel
    ) {
        $this->levelModel = $levelModel;
    }

    public function store(Request $request)
    {


            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];
       
        $save = $this->levelModel->create($data);


        if (!$save) {
            session()->flash('error', 'Failed insert data!');
        } else {
            session()->flash('success', 'Data added successfully!');
        }

        return redirect('level/add-level');
    
            
    }
    public function getLevel(){
        $data = $this->levelModel->get();
        return view('admin.level_table', compact('data'));
    }
    public function delete($id)
    {
        $delete = $this->levelModel->where('id', $id)->delete();

        if (!$delete) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/level-list')->with('success', 'Data deleted successfully');
    }
    public function update(Request $request,$id)
    {
        $data->update([

            'name'=> $request->name,
            'description'=> $request->description,
        ]);
        return redirect('admin.level_table')->with('success', 'Data deleted successfully');
    }

    }

