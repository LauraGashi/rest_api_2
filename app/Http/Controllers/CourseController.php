<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function Index()
    {
        return Course::all();
    }
    public function store(Request $request)
    {
        try {
            $course = new Course();
            $course->name = $request->name;
            $course->instructor_id = $request->instructor_id;
            $course->price = $request->price;

            if ($course -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'Course created successfully@']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->name = $request->name;
            $course->instructor_id = $request->instructor_id;
            $course->price = $request->price;

            if ($course -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'Course updated successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);

            if ($course -> delete())
            {
                return response()->json(['status' => 'success', 'message' => 'Course deleted successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
