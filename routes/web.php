<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::get('/about', function () {
    return view('about');
});



Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello World!',
    ]);
});




// Route::get('/tasks', function () use ($taskList) {
//     //ddd(request()->all());
//     if (request()->search) {
//         return $taskList[request()->search];
//     }
//     return $taskList;
// });

Route::get('/tasks', [TaskController::class,'index']);

// Route::get('/tasks/{param}', function ($param) use ($taskList) {
//     try {
//         return $taskList[$param];
//     } catch (\Throwable $th) {
//         return response()->json([
//             'message' => 'Task not found',
//         ], 404);
//     }
// });
Route::get('/tasks/{id}', [TaskController::class, 'show']);

Route::post('/tasks', [TaskController::class, 'store']);
// { return request()->all();});


Route::patch('/tasks/{id}', [TaskController::class, 'update']);

Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
//     unset($taskList[$key]);
//     return $taskList;
// });


// $taskList = [
//     'first' => 'Sleep',
//     'second' => 'Eat',
//     'third' => 'Code',
// ];
