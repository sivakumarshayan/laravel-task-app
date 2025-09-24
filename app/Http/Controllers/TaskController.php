<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function AllTask()
    {
        $task = Task::where('user_id', Auth::id())->latest()->get();
        return view('admin.task.all_task', compact('task'));
    }

    public function AddTask()
    {
        return view('admin.task.add_task');
    }

    public function StoreTask(Request $request)
    {

        $request->validate([
        'title' => 'required|string|unique:tasks',
        'short_desc' => 'nullable|string',
        'description' => 'required|string',
    ]);

        Task::create([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        $notification = array(
            'message' => 'Task Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.task')->with($notification);
    }

    public function ViewTask($id)
    {
        $task = Task::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

        if (!$task) {
        
        return redirect()->route('all.task')->with([
         'error' => 'You are not authorized to view this task.'
       ]);
    }
        return view('admin.task.view_task', compact('task'));
    }

    public function EditTask($id)
    {
        $task = Task::where('id', $id)
                ->where('user_id', Auth::id()) 
                ->first();

        if (!$task) {
        return redirect()->route('all.task')->with('error', 'You are not authorized to edit this task.');
        }

        return view('admin.task.edit_task', compact('task'));
    }

    public function UpdateTask(Request $request)
    {

        $task_id = $request->id;

        $task = Task::where('id', $task_id)
                ->where('user_id', Auth::id())
                ->first();

    if (!$task) {
        return redirect()->route('all.task')->with('error', 'You are not authorized to update this task.');
    }

        // $request->validate([
        //     'title' => ['unique' =>Rule::unique('tasks')->ignore($task_id)],'required',
        //     'description' => 'required'
        // ]);

        Task::find($task_id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'description' => $request->description
            
        ]);

        $notification = array(
            'message' => 'Task Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.task')->with($notification);
    }

    public function DeleteTask($id)
    {
        $task = Task::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

    if (!$task) {
        
        return redirect()->back()->with([
            'error' => 'You are not authorized to delete this task.'
        ]);
    }

    $task->delete();

        $notification = array(
            'message' => 'Task Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CompleteTask($id)
    {
        $task = Task::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

    if (!$task) {
        return redirect()->back()->with([
            'error' => 'You are not authorized to complete this task.'
        ]);
    }

     $task->update(['status' => 1]);

        $notification = array(
            'message' => 'Task Completed',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PendingTask($id)
    {
        $task = Task::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

    if (!$task) {
        return redirect()->back()->with([
            'error' => 'You are not authorized to update this task.'
        ]);
    }

    $task->update(['status' => 0]);

        $notification = array(
            'message' => 'Task pending',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }


}
