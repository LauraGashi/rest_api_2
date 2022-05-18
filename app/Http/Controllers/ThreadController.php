<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function Index()
    {
        return Thread::all();
    }
    public function store(Request $request)
    {
        try {
            $thread = new Thread();
            $thread->instructor_id = $request->instructor_id;
            $thread->title = $request->title;
            $thread->body = $request->body;
            $user_id = $course->instructor_id;
            $user_detail = User_Detail::where('role_id', '=' , $user_id);
            $user_type = $user_detail->role_id;
            if($user_type == 2){
                if ($course -> save())
                {
                    return response()->json(['status' => 'success', 'message' => 'Thread created successfully']);
                }
            }
                        
                else{
                    return response()->json(['status' => 'error', 'message' => 'Thread can\'t be posted']);
                }

        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $thread = Thread::findOrFail($id);
            $thread->instructor_id = $request->instructor_id;
            $thread->title = $request->title;
            $thread->body = $request->body;
            $user_id = $course->instructor_id;
            $user_detail = User_Detail::where('role_id', '=' , $user_id);
            $user_type = $user_detail->role_id;
            if($user_type == 2){
                if ($course -> save())
                {
                    return response()->json(['status' => 'success', 'message' => 'Thread updated successfully']);
                }
            }
                        
                else{
                    return response()->json(['status' => 'error', 'message' => 'Thread can\'t be updated']);
                }

        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $thread = Thread::findOrFail($id);
            $user_id = $course->instructor_id;
            $user_detail = User_Detail::where('role_id', '=' , $user_id);
            $user_type = $user_detail->role_id;
            if($user_type == 2){
                if ($course -> dalete())
                {
                    return response()->json(['status' => 'success', 'message' => 'Thread deleted successfully']);
                }
            }
                        
                else{
                    return response()->json(['status' => 'error', 'message' => 'Thread can\'t be deleted']);
                }

            
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
