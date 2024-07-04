<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function addGroupForm(){
        return view("add_group_form");
    }
}
