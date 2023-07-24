<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;

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
});

require __DIR__ . '/auth.php';

Route::middleware('role:1')->prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('faculties', FacultyController::class);

    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/adminlecturerlist', [UserController::class, 'index'])->name('admin.adminlecturerlist');
    Route::get('/adminlecturer/create', [UserController::class, 'create'])->name('admin.adminlecturer_create');
    Route::get('/adminlecturer/edit', [UserController::class, 'edit'])->name('admin.adminlecturer_edit');

    Route::get('/studentlist', [AdminController::class, 'Studentlist'])->name('admin.studentlist');
    Route::get('/studentlist', [UserController::class, 'studentlist'])->name('admin.studentlist');
    Route::get('/student_create', [AdminController::class, 'Student_create'])->name('admin.student_create');
    Route::get('/student_edit', [AdminController::class, 'Student_edit'])->name('admin.student_edit');

    Route::get('/facultylist', [FacultyController::class, 'index'])->name('admin.facultylist'); //show faculty page and list
    Route::post('/faculty/create', [FacultyController::class, 'store'])->name('admin.facultycreate'); //store in database
    Route::put('/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('admin.facultyedit');//edit
    Route::delete('/faculty/{faculty}', [FacultyController::class, 'destroy'])->name('admin.facultydelete');//delete


    Route::get('/programslist', [CourseController::class, 'index'])->name('admin.programslist');
    Route::post('/program/create', [CourseController::class, 'store'])->name('admin.programcreate'); //store in database
    Route::put('/program/{program}/edit', [CourseController::class, 'edit'])->name('admin.programedit');//edit
    Route::delete('/program/{program}', [CourseController::class, 'destroy'])->name('admin.programdelete');//delete

    Route::get('/subjectlist', [AdminController::class, 'Subjectlist'])->name('admin.subjectlist');
    Route::get('/subjectlist', [SubjectController::class, 'index'])->name('admin.subjectlist');

    Route::get('/classeslist', [AdminController::class, 'Classeslist'])->name('admin.classeslist');

    Route::get('/attendancelist', [AdminController::class, 'Attendancelist'])->name('attendancelist');


});

Route::middleware('role:2')->prefix('lecturer')->group(function () {

    Route::get('/dashboard', [LecturerController::class, 'LecturerDashboard'])->name('lecturer.dashboard');
    Route::get('/subjectlist', [LecturerController::class, 'Subjectlist'])->name('lecturer.subjectlist');
    Route::get('/subjectlist', [SubjectController::class, 'index'])->name('lecturer.subjectlist');
    Route::get('/classeslist', [LecturerController::class, 'Classeslist'])->name('lecturer.classeslist');
    Route::get('/attendancelist', [LecturerController::class, 'Attendancelist'])->name('attendancelist');


});

Route::middleware('role:3')->prefix('student')->group(function () {

    Route::get('/dashboard', [StudentController::class, 'StudentDashboard'])->name('student.dashboard');
    Route::get('/subjectlist', [StudentController::class, 'Subjectlist'])->name('subjectlist');
    Route::get('/classeslist', [StudentController::class, 'Classeslist'])->name('classeslist');
    Route::get('/attendance', [StudentController::class, 'Attendance'])->name('student.attendance');

});
