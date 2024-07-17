<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Level;
use App\Models\Group;

use Illuminate\Http\Request;

class WebAdminController extends Controller
{
    public function __construct(
        protected Member $memberModel ){
        $this->memberModel = $memberModel;
         }
    

    public function hello()
    {
        return view('admin.welcome');
    }

    public function getMember()
    {
        $data = $this->memberModel->get();
        return view('admin.member_table', compact('data'));
    }

   
   
}