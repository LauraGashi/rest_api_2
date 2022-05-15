<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function Index()
    {
        return UserDetail::all();
    }
    public function store(Request $request)
    {
        try {
            $user_detail = new UserDetail();
            $user_detail->user_id = $request->user_id;
            $user_detail->role_id = $request->role_id;
            $user_detail->address = $request->address;

            if ($user_detail -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Detail created successfully@']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user_detail = UserDetail::findOrFail($id);
            $user_detail->user_id = $request->user_id;
            $user_detail->role_id = $request->role_id;
            $user_detail->address = $request->address;

            if ($user_detail -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Detail updated successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $user_detail = UserDetail::findOrFail($id);

            if ($user_detail -> delete())
            {
                return response()->json(['status' => 'success', 'message' => 'User_Detail deleted successfully']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
