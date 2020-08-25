<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Get all available tasks
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Get one task by its id
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $task = Task::find($id);

        if($task){
            return response()->json($task);
        }

        return response()->json(["Task not found."]);
    }

    /**
     * Add new task
     */
    public function create(Request $newTask)
    {
        $task = Task::create([
            'title' => $newTask->title,
            'description' => $newTask->description,
        ]);

        if($task->wasRecentlyCreated){
            return response()->json(["Task created successfully"]);
        }

        return response()->json(["Unable to create task. Try again"]);
    }

    /**
     * Edit Task
     * @param $id
     * @param Request $editedTask
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id, Request $editedTask)
    {
        $task = Task::find($id);

        if($task){
            //Update
            $task->title = $editedTask->title;
            $task->description = $editedTask->description;
            $task->save();

            return response()->json("Task updated successfully");

        }

        return response()->json(["Unable to update task"]);
    }

    /**
     * Delete Task
     *
     */
    public function delete($id)
    {
        $task = Task::find($id);
        if($task){
            if($task->delete()){
                return response()->json(["Task deleted successfully"]);
            }
        }

        return response()->json(["Unable to delete task"]);
    }
}
