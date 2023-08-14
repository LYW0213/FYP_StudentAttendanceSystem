<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class ClassController extends Controller
{
    public function index(Subject $subject)
    {
        $classes = Classes::where('subject_id', $subject->id)->paginate(10);
        $currentTime = now();
        return view('classeslist', compact('classes', 'subject', 'currentTime'));
    }

    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string',
            'venue' => 'required|string',
            'day' => 'required|date_format:Y-m-d',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ]);

        $class = new Classes();
        $class->name = $request->input('name');
        $class->venue = $request->input('venue');
        $class->day = $request->input('day');
        $class->start = $request->input('start');
        $class->end = $request->input('end');
        $class->subject_id = $subject->id;
        $class->password = Str::random(10);
        $class->save();


        return redirect()->route('classeslist', ['subject' => $subject])->with('success', 'Program Edited Successfully!');
    }


    public function attendance(Request $request, Classes $class)
    {
        $message = [];

        if (!($class->password == $request->password)) {
            $message['message'] = "Attend Fail";
            $message['status'] = "Error";
        } else {
            // Check if the user already has an attendance status for this class
            $existingAttendance = $class->attendances()->where('user_id', $request->user()->id)->first();

            if ($existingAttendance) {
                // User already has attendance status, show a message
                $message['message'] = "You've already taken attendance for this class.";
                $message['status'] = "Error";
            } else {
                $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->start);
                $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->end);
                $currenttime = now();

                if ($request->user()->roles_id == 3) {
                    if ($currenttime < $starttime) {
                        // Attend on time
                        $class->attendances()->create(['statuses_id' => 1, 'user_id' => $request->user()->id]);
                        $message['message'] = "Attend Successfully";
                        $message['status'] = "success";
                    } else if ($currenttime >= $starttime && $currenttime <= $endtime) {
                        if ($currenttime->diffInMinutes($starttime) <= 15) {
                            $class->attendances()->create(['statuses_id' => 1, 'user_id' => $request->user()->id]);
                            $message['message'] = "Attend Successfully";
                            $message['status'] = "success";
                        } else {
                            $class->attendances()->create(['statuses_id' => 3, 'user_id' => $request->user()->id]);
                            $message['message'] = "You're Late";
                            $message['status'] = "Error";
                        }
                    } else if ($currenttime > $endtime) {
                        // Absent
                        $class->attendances()->create(['statuses_id' => 2, 'user_id' => $request->user()->id]);
                        $message['message'] = "Absent";
                        $message['status'] = "Error";
                    }
                } else {
                    $message['message'] = "You're not a student";
                    $message['status'] = "Error";
                }
            }
        }

        return redirect()->route('attendanceview', ['class' => $class])->with($message);
    }



    public function view(Request $request, Classes $class)
    {

        $attendances = $class->attendances()->paginate(10); // Paginate the attendance records for the class
        $attendanceCount = $class->attendances()->count();
        $countPresent = $class
            ->attendances()
            ->where('statuses_id', 1)
            ->count();
        $countAbsent = $class
            ->attendances()
            ->where('statuses_id', 2)
            ->count();
        $countLate = $class
            ->attendances()
            ->where('statuses_id', 3)
            ->count();
        return view('attendance_list', compact('class', 'attendances', 'attendanceCount', 'countPresent', 'countAbsent', 'countLate'));
    }
}
