<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index()
    {
        return User::all();
    }
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = app('hash')->make($request->password);

            if ($user -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'User created successfully@']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user_id = $user->user_id;
            $user_detail = User_Detail::where('user_id', '=' , $user_id);
            $user_type = $user_detail->user_type;
            if($user_type == 1){
                if ($user -> save())
                {
                    return response()->json(['status' => 'success', 'message' => 'User updated successfully']);
                }
            }
            else{
                $user = User :: findOrFail($request->user_id);
                $userId = $user -> id;
                if($user_id == $userId){
                    if ($user -> save())
                    {
                        return response()->json(['status' => 'success', 'message' => 'User updated successfully']);
                    }                }
                else{
                    return response()->json(['status' => 'error', 'message' => 'User can\'t be updated']);
                }
            }

        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user_id = $user->user_id;
            $user_detail = User_Detail::where('user_id', '=' , $user_id);
            $user_type = $user_detail->user_type;
            if($user_type == 1){
                if ($user -> delete())
                {
                    return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
                }
            }
            else{
                $user = User :: findOrFail($request->user_id);
                $userId = $user -> id;
                if($user_id == $userId){
                    if ($user -> delete())
                    {
                        return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
                    }                }
                else{
                    return response()->json(['status' => 'error', 'message' => 'User can\'t be deleted']);
                }
            }
            
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
