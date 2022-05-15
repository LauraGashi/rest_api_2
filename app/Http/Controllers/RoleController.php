<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function Index()
    {
        return Role::all();
    }
    public function store(Request $request)
    {
        try {
            $role = new Role();
            $role->role = $request->role;

            if ($role -> save())
            {
                return response()->json(['status' => 'success', 'message' => 'Role created successfully@']);
            }
        } catch(\Exception $e)
        {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
