<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
        'tasks' => $tasks,
        'title' => 'all tasks'
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'place' => 'required|max:255',
                'dateofbirthday' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->place = $request->place;
    $task->dateofbirthday = $request->dateofbirthday;
    $task->save();

    return redirect('/');
});

/**
 * Удалить задачу
 */
Route::delete('/task/delete/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});

Route::post('/task/update/{task}', function (Task $task,Request $request) {
    
            $validator = Validator::make($request->all(), [
                    'newname' => 'required|max:255',
                    'newplace' => 'required|max:500',
                    'newdateofbirthday' => 'required|max:500',
        ]);
             if ($validator->fails()) {
            return redirect('#update-' . $_POST['id'])
                            ->withInput()
                            ->withErrors($validator);
        }
  
    $task->name = $request->newname;
    $task->place = $request->newplace;
    $task->dateofbirthday = $request->newdateofbirthday;
    $task->save();

    return redirect('/');
});


