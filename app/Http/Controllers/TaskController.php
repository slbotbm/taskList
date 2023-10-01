<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
use Auth;
use App\Models\User;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('updated_at', 'desc')->paginate(25);
        $complete = Task::where('completed', true)->get();
        $incomplete = Task::where('completed', false)->get();
        return response()->view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'task' => 'required | max:191',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('task.create')
            ->withInput()
            ->withErrors($validator);
        }
        $data = $request->merge(['user_id' => Auth::user()->id])->all();

        $result = Task::create($data);
        return redirect()->route('task.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return response()->view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return response()->view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required | max:191',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('task.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        $result = Task::find($id)->update($request->all());
        return redirect()->route('task.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Task::find($id)->delete();
        return redirect()->route('task.index');
    
    }

    public function mydata() {
        $tasks = User::query()
      ->find(Auth::user()->id)
      ->userTasks()
      ->latest()
      ->paginate(25);
    $name = User::query()->find(Auth::user()->id)->name;
    return response()->view('task.index', compact('tasks', 'name'));
    }

    public function complete(string $id) {
        $task = Task::find($id);
        if($task->completed === 0) {
            $task->completed = 1;
            $task->completed_at = now();
        } else {
            $task->completed = 0;
            $task->completed_at = $task->created_at;
        }
        $task->save();
        return redirect()->route('task.index', $id);
    }

   
}