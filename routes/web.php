<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:1')->prefix('admin')->group(function () {

        Route::get('/adminlecturerlist', [UserController::class, 'adminlecturer_index'])->name('admin.adminlecturerlist');
        Route::get('/adminlecturer/create', [UserController::class, 'Adminlecturer_create'])->name('admin.adminlecturer_create');
        Route::post('/adminlecturer/store', [UserController::class, 'Adminlecturer_store'])->name('admin.adminlecturer_store');
        Route::delete('/adminlecturer/{user}', [UserController::class, 'destroy'])->name('admin.adminlecturer_delete'); // delete

        Route::get('/studentlist', [StudentController::class, 'Studentlist'])->name('admin.studentlist');
        Route::get('/student_create', [StudentController::class, 'Student_create'])->name('admin.student_create');
        Route::post('/student_store', [StudentController::class, 'Student_store'])->name('admin.student_store');

        Route::get('/facultylist', [FacultyController::class, 'index'])->name('admin.facultylist'); //show faculty page and list
        Route::post('/faculty/create', [FacultyController::class, 'store'])->name('admin.facultycreate'); //store in database
        Route::put('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('admin.facultyedit'); //edit
        Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy'])->name('admin.facultydelete'); //delete

        Route::get('/programslist', [CourseController::class, 'index'])->name('admin.programslist');
        Route::post('/program/create', [CourseController::class, 'store'])->name('admin.programcreate'); //store in database
        Route::put('/program/{program}/edit', [CourseController::class, 'edit'])->name('admin.programedit'); //edit
        Route::delete('/program/{program}', [CourseController::class, 'destroy'])->name('admin.programdelete'); //delete

        Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subjectdelete'); //delete


    });

    Route::middleware('role:2')->prefix('lecturer')->group(function () {

        Route::get('/dashboard', [LecturerController::class, 'LecturerDashboard'])->name('lecturer.dashboard');

        Route::get('/attendancelist', [LecturerController::class, 'Attendancelist'])->name('attendancelist');

    });

    Route::middleware('role:3')->prefix('student')->group(function () {

        Route::get('/dashboard', [StudentController::class, 'StudentDashboard'])->name('student.dashboard');

        Route::get('/attendance/{class}/{password}', [ClassController::class, 'attendance'])->name('attendance');

    });

    Route::middleware('role:1,2')->group(function () {

        Route::post('/subject/create', [SubjectController::class, 'store'])->name('subjectcreate'); //store in database

        Route::post('/{subject}/classeslist/create', [ClassController::class, 'store'])->name('classescreate');

    });

    Route::middleware('role:1,2,3')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/{user}/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/{user}/profileStudent', [StudentController::class, 'profile'])->name('profileStudent');

        Route::get('/subjectlist', [SubjectController::class, 'index'])->name('subjectlist');


        Route::get('/{subject}/classeslist', [ClassController::class, 'index'])->name('classeslist');

        Route::get('/attendance/{class}', [ClassController::class, 'view'])->name('attendanceview');

    });
});

require __DIR__ . '/auth.php';
