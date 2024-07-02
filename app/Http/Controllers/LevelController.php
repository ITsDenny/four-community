<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;




class LevelController extends Controller
{
    
    public function getLevelForm(){

        return view('add_level_form');
    }

    public function __construct(
        protected Level $levelModel
    ) {
        $this->levelModel = $levelModel;
    }

    public function store(Request $request)
    {

        $request->validate
            ( [
                'name' => 'required|min:20',
                'description' => 'required|min:20',
            ] );

            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];
       
        $save = $this->levelModel->create($data);


        return redirect()->route('add_level_form')->with(['success'=>'data berhasil di input']);
            
    


    }

}