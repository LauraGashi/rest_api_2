<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function Index()
    {
        return UserCourse::all();
    }
    public function store(Request $request)
    {
        try {
            $user_course = new UserCourse();
            $user_course->user_id = $request->user_id;
            $user_course->course_id = $request->course_id;

            if ($user_course -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Course created successfully!']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user_course = UserCourse::findOrFail($id);
            $user_course->user_id = $request->user_id;
            $user_course->course_id = $request->course_id;

            if ($user_course -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Course updated successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $user_course = UserCourse::findOrFail($id);

            if ($user_course -> delete())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Course deleted successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
