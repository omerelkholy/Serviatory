<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view("dashboard.userEdit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
           "role" => "required"
        ]);

        $user->update([
            "role" => $validated["role"]
        ]);
        return redirect()->route("dashboard.users");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("dashboard.users");
    }
}
