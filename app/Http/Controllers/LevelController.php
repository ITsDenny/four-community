<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;




class LevelController extends Controller
{
    
    public function getLevelForm(){

        return view('add_level_form');
    }

    public function store(Request $request)
    {

        $request->validate
            ( [
                'name' => 'required|min:20',
                'description' => 'required|min:20'
            ] );

        Level::create
        ([
            'name' => $request->name,
            'description' => $request->description

        ]);



        return redirect()->route('add_level_form')->with(['success'=>'data berhasil di input']);
            
    


    }

}