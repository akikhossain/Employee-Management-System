<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function createTask()
    {
        $employees = Employee::all();

        $tasks  =  Task::all();
        return view('admin.pages.Task.createTask', compact('tasks', 'employees'));
    }

    // My Task
    public function myTask()
    {
        // $userId = auth()->user()->id;
        // $tasks = Task::where('employee_id', $userId)
        //     ->whereIn('status', ['pending', 'completed on time', 'completed in late'])
        //     ->paginate(5);

        // return view('admin.pages.Task.myTask', compact('tasks'));

        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Unauthorized action.');
        }

        $tasks = Task::with(['employee'])
            ->where('employee_id', $employee->id)
            ->get();

        $tasks->each(function ($task) {
            $employee = $task->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $task->designation = $employee->designation->name;
            $task->department = $employee->department->name;
        });

        return view('admin.pages.Task.myTask', compact('tasks'));
    }



    public function storeTask(Request $request)
    {
        // Check if the employee has an ongoing or completed task
        $employeePendingTask = Task::where('employee_id', $request->employee_id)
            ->where('status', 'pending')
            ->exists();

        // If there's no pending task, allow assignment of a new task
        if (!$employeePendingTask) {
            // Validation for new task assignment
            $validate = Validator::make($request->all(), [
                'from_date' => 'required|date|after_or_equal:today',
                'to_date' => 'required|date|after_or_equal:from_date',
                'task_name' => 'required',
                'employee_id' => 'required|unique:tasks,employee_id,NULL,id,from_date,' . $request->from_date,
                'task_description' => 'nullable|string',
            ]);

            // Check for overlapping dates for the same employee (similar to the previous check)
            $overlappingTasks = Task::where('employee_id', $request->employee_id)
                ->where(function ($query) use ($request) {
                    $query->where(function ($q) use ($request) {
                        $q->where('from_date', '<=', $request->from_date)
                            ->where('to_date', '>=', $request->from_date);
                    })->orWhere(function ($q) use ($request) {
                        $q->where('from_date', '>=', $request->from_date)
                            ->where('from_date', '<=', $request->to_date);
                    });
                })
                ->exists();

            if ($validate->fails() || $overlappingTasks) {
                if ($overlappingTasks) {
                    notify()->error('Overlapping dates for the same employee.');
                } else {
                    notify()->error($validate->getMessageBag());
                }
                return redirect()->back();
            }

            // Task creation logic
            $fromDate = new \DateTime($request->from_date);
            $toDate = new \DateTime($request->to_date);
            $totalDays = $fromDate->diff($toDate)->days + 1;

            Task::create([
                'employee_id' => $request->employee_id,
                'task_name' => $request->task_name,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'total_days' => $totalDays,
                'task_description' => $request->task_description,
            ]);

            notify()->success('New Task created');
            return redirect()->back();
        } else {
            // If there's a pending task, check if it's completed on time or late
            $completedTask = Task::where('employee_id', $request->employee_id)
                ->whereIn('status', ['completed on time', 'completed in late'])
                ->exists();

            if ($completedTask) {
                // Task creation logic
                $fromDate = new \DateTime($request->from_date);
                $toDate = new \DateTime($request->to_date);
                $totalDays = $fromDate->diff($toDate)->days + 1;

                Task::create([
                    'employee_id' => $request->employee_id,
                    'task_name' => $request->task_name,
                    'from_date' => $request->from_date,
                    'to_date' => $request->to_date,
                    'total_days' => $totalDays,
                    'task_description' => $request->task_description,
                ]);

                notify()->success('New Task created');
                return redirect()->back();
            }
        }

        // If the employee has a pending task and it's not completed on time or late, prevent assignment of a new task
        notify()->error('This employee has a pending task that needs to be completed on time or late before assigning a new task.');
        return redirect()->back();
    }




    // task list
    public function taskList()
    {


        $tasks  =  Task::with(['employee'])->get();
        $tasks->each(function ($task) {
            $employee = $task->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $task->designation = $employee->designation->name;
            $task->department = $employee->department->name;
        });
        return view('admin.pages.Task.viewTask', compact('tasks'));
    }

    // Task Completed InTime and Late
    public function completeTaskOnTime($id)
    {
        $task = Task::find($id);
        if ($task) {
            $completionDate = now();
            $toDate = \Carbon\Carbon::createFromFormat('Y-m-d', $task->to_date);
            $fromDate = \Carbon\Carbon::createFromFormat('Y-m-d', $task->from_date);

            if ($completionDate->gt($toDate)) {
                $task->status = 'completed in late';
                notify()->success('Completed But in Late');
            } else if ($completionDate->lt($fromDate)) {
                // Error: Attempted completion before the task's start date
                notify()->error('Task completion cannot occur before the designated start date');
            } else {
                $task->status = 'completed on time';
                notify()->success('Completed on Time');
            }

            $task->save();
            return redirect()->back();
        }
    }


    public function completeTaskLate($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->status = 'completed in late';
            $task->save();
            notify()->success('Completed But in Late');
            return redirect()->back();
        }
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if ($task && $task->status !== 'completed') {
            $task->delete();
            notify()->success('Task Deleted Successfully.');
        } else {
            notify()->error('Cannot delete a completed task.');
        }
        return redirect()->back();
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        return view('admin.pages.Task.editTask', compact('task'));
    }
    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->update([
                'task_name' => $request->task_name,
                'task_description' => $request->task_description,
            ]);
            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }


    public function searchTask(Request $request)
    {
        $searchTerm = $request->search;

        $tasks = Task::where(function ($query) use ($searchTerm) {
            $query->where('task_name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('employee', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orWhereHas('employee.designation', function ($q) use ($searchTerm) {
                    $q->where('designation_name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orWhereHas('employee.department', function ($q) use ($searchTerm) {
                    $q->where('department_name', 'LIKE', '%' . $searchTerm . '%');
                });
        })->paginate(10);

        return view('admin.pages.Task.searchTask', compact('tasks'));
    }
}
