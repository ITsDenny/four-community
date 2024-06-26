<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(
        private Member $memberModel
    ) {
        $this->memberModel = $memberModel;
    }

    public function countTotalMember()
    {
        $countMember = $this->memberModel->count();

        return view('admin.welcome', compact('countMember'));
    }
}
