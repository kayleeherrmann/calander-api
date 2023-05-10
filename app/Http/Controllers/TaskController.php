<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskIndexRequest;
use App\Http\Requests\TaskRequest;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(TaskIndexRequest $request)
    {
        Log::info($request->validated());
        $tasks = auth()->user()->tasks;

        foreach ($request->validated() as $column => $params) {
            Log::info($column . 'COLUMN');
            Log::info($params);
            $tasks = $tasks->where($column, $params);
        }

        return $this->success([
            'tasks' =>   $tasks,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
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
