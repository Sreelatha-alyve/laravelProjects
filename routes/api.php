<?php
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/students', function () {
    // Check if the students data is cached in Redis
    $students = Redis::get('students');

    if (!$students) {
        // If not cached, fetch from the database
        $students = DB::table('students')->get();

        // Cache the data for future use
        Redis::set('students', json_encode($students));
        Redis::expire('students', 3600); // Cache expiry in seconds
    } else {
        // Decode the cached JSON data
        $students = json_decode($students);
    }

    return response()->json($students);
});
