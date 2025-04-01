<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class TaskController extends Controller
{
    // index メソッドを追加する
    public function index(int $id)
    {
        
        $folders = Folder::all();

        return view('tasks/index', [
            'folders' => $folders,
            "folder_id" => $id
        ]);
    }
}
