<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * 指定されたフォルダのタスク一覧を表示する
     *
     * @param int $id フォルダのID
     * @return \Illuminate\View\View
     */
    public function index(int $id)
    {
        // すべてのフォルダを取得（フォルダ一覧の表示に使用）
        $folders = Folder::all();

        // 指定されたIDのフォルダを取得
        $folder = Folder::find($id);

        // 指定されたフォルダに紐づくタスクを取得
        $tasks = $folder->tasks()->get();

        // tasks/index ビューにデータを渡して表示
        return view('tasks/index', [
            'folders' => $folders, // フォルダ一覧
            'folder_id' => $id,    // 現在選択中のフォルダID
            'tasks' => $tasks      // 選択中のフォルダに紐づくタスク
        ]);
    }
}
