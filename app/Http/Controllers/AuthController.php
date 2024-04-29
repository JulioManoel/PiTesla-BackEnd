<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($request->type === 'student') {
            $student = Student::where('email', $request->email)->first();

            if (!$student) return response()->json(['message' => 'Invalid Email'], 404);
            if (!password_verify($request->password, $student->password)) return response()->json(['message' => 'Invalid Password'], 401);

            if (Auth::guard('student')->attempt($credentials, true)) {
                return response()->json(['token' => $student->remember_token, 'message' => 'Student Logged'], 200);
            } else {
                return response()->json(['message' => 'Authentication failed'], 401);
            }
        }

        $teacher = Teacher::where('email', $request->email)->first();

        if (!$teacher) return response()->json(['message' => 'Invalid Email'], 404);
        if (!password_verify($request->password, $teacher->password)) return response()->json(['message' => 'Invalid Password'], 401);

        if (Auth::guard('teacher')->attempt($credentials, true)) {
            return response()->json(['message' => 'Teacher Logged'], 200);
        } else {
            return response()->json(['message' => 'Authentication failed'], 401);
        }
    }

    public function me(Request $request)
    {
        $token = $request->bearerToken();
        $teacher = Teacher::where('remember_token', $token)->first();
        $student = Student::where('remember_token', $token)->first();

        if ($student) return response()->json($student, 200);
        if ($teacher) return response()->json($teacher, 200);

        return response(['message' => 'Unauthenticated'], 403);
    }
}
