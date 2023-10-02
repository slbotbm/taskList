<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Validator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('search.input')
            ->withInput()
            ->withErrors($validator);
        }
        $keyword = trim($request->keyword);
        $users = User::where('name', 'like', "%{$keyword}%")->distinct()->get();
        $tasks = Task::query()->where('task', 'like', "%{$keyword}%")->distinct()->get();
        $descriptions = Task::query()->where('description', 'like', "%{$keyword}%")->distinct('task')->get();
        $ids = Task::query()->where('id', 'like', "%{$keyword}%")->get();
        return response()->view('search.result', compact('tasks', 'descriptions', 'users', 'ids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('search.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
