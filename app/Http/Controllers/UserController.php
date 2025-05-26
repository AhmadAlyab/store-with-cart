<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
        ]);

        $user = User::findOrFail($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect(route('users.index', absolute: false));
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id)->delete();

        return redirect()->back()->with('success', 'تمت حذف المستخدم بنجاح!');

    }
}
