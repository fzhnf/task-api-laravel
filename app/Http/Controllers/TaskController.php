<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'Sleep',
        'second' => 'Eat',
        'third' => 'Code',
    ];

    public function index(Request $request) {
        if ($request->search) {
            $tasks = DB::table('tasks')
            ->where('task', 'like', '%'.$request->search.'%')
            ->get();

            return $tasks;
        }

        $tasks = DB::table('tasks')->get();
        return $tasks;
        // if ($request->search) {
        //     try {
        //         return $this->taskList[$request->search];
        //     } catch (\Throwable $th) {
        //         return response()->json([
        //             'message' => 'Task not found',
        //         ], 404);
        //     }
        // }
        // return $this->taskList;
    }
    
    public function show($id) {
        $task = DB::table('tasks')
        ->where('id', $id)
        ->first();
        ddd($task);
        // try {
        //     return $this->taskList[$param];
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'message' => 'Task not found',
        //     ], 404);
        // }
    }

    public function store(Request $request) {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return 'success';
    }

    public function update(Request $request, $id) {
        $task = DB::table('tasks')->where('id', $id)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'success';
        // $this->taskList[$key] = $request->task;
        // return $this->taskList;
    }

    public function destroy($id) {
        DB::table('tasks')
        ->where('id', $id)
        ->delete();

        return 'success';
        // unset($this->taskList[$key]);
        // return $this->taskList;
    }
}
