<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Folder $folder)//ログイン押下
    {
        if (Auth::user()->id !== $folder->user_id) {
            abort(403);
        }
        // ★ ユーザーのフォルダを取得する
        $folders = Auth::user()->folders()->get();
        // $folders = Folder::all();
        $current_folder = Folder::find($folder);
        if (is_null($current_folder)) {
            abort(404);
        }
        // $tasks = Task::where('folder_id', $current_folder->id)->get();一個下の行と同じことしてる
        $tasks = $folder->tasks()->get();//リレーション組んだ後にできる

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(Folder $folder)
    {
        
        return view('tasks/create', [
            'folder_id' =>  $folder->id,
        ]);
    }

    public function create(Folder $folder, CreateTask $request)
    {
        // $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $folder->tasks()->save($task);//リレーションを活かしたデータの保存方法で$current_folder に紐づくタスクを作成しています

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }
    public function showEditForm(Folder $folder, Task $task)
    {
        // $task = Task::find($task_id);
        // dd($folder);
        // dd($task);
        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
        $this->checkRelation($folder, $task);
        
        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
        $this->checkRelation($folder, $task);
        // dd($request);
        // $validated = $request->validated();
        // dd($validated);
        // 1
        // $task = Task::find($task_id);

        // 2
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();
        // dd($ task);

        // 3
        return redirect()->route('tasks.index', [
            'folder' => $task->folder_id,
            'id' => $task->folder_id,
            'task' => $task->folder_id,
        ]);

    }
    private function checkRelation(Folder $folder, Task $task)
    {
        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
    }
}
