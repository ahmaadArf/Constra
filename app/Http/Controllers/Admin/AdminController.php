<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function user()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.users')->
        with('msg', 'Client delete successfully')->with('type', 'success');
    }

}
