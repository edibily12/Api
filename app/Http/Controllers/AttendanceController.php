<?php

namespace App\Http\Controllers;

use App\Models\AttenndanceRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AttenndanceRecord::orderByDesc('id')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required'
        ]);

        $teacher_id = $validated['teacher_id'];
        $current_time = Carbon::now();

        // Check for existing attendance record for today
        $today = Carbon::today();
        $attendanceRecord = AttenndanceRecord::where('teacher_id', $teacher_id)
            ->whereDate('created_at', $today)
            ->first();

        if (!$attendanceRecord) {
            // If no record exists for today, this is a sign-in attempt
            AttenndanceRecord::create([
                'teacher_id' => $teacher_id,
                'sign_in' => $current_time
            ]);

            return response()->json(['message' => 'Sign-in recorded successfully.'], 201);
        }

        // If a record exists, this is a sign-out attempt
        if (!$attendanceRecord->sign_out) {
            $attendanceRecord->update([
                'sign_out' => $current_time
            ]);

            return response()->json(['message' => 'Sign-out recorded successfully.'], 200);
        }

        return response()->json(['message' => 'Attendance already recorded for today.'], 400);
    }


}
