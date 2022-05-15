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

            if ($thread -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'Thread created successfully@']);
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

            if ($thread -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'Thread updated successfully']);
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

            if ($thread -> delete())
            {
                return response()->json(['status' => 'success', 'message' => 'Thread deleted successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
