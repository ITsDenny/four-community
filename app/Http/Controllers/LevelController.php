<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function create(Request $request)
    {
        

    }

    public function getLevelForm(){

        return view('add_level_form');
    }
}
