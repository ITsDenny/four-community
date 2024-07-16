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

    public function getLevelForm()
    {
        return view('add_level_form');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $save = $this->levelModel->create($data);

        if (!$save) return back()->with('error', 'Failed insert data!');

        return redirect('/admin/level-list')->with('success', 'Data deleted successfully');
    }
    public function update(Request $request, $id)
    {
        $this->levelModel->update->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect('admin.level_table')->with('success', 'Data deleted successfully');
    }
}
