<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * For login page
     */
    public function loginPage()
    {
        return view('login');
    }


    /**
     * For redirect to dashboard 
     */
    public function Dashboard()
    {
        if (Auth::user()->role == 'admin') {
            $totalUsers = User::count();
            $task = Task::all();
            $totalTask = $task->count();
            $overDueTask = $task->where('status', 'overdue')->count();
            $pendingTask = $task->where('status', 'pending')->count();
            $completeTask = $task->where('status', 'complete')->count();
            $inProgressTask = $task->where('status', 'in_progress')->count();


            return view('dashboard', compact('totalUsers', 'totalTask', 'overDueTask', 'pendingTask', 'completeTask', 'inProgressTask'));
        } else {
            $task = Task::where('user_id', Auth::id())->get();
            $totalTask = $task->count();
            $overDueTask = $task->where('status', 'overdue')->count();
            $pendingTask = $task->where('status', 'pending')->count();
            $completeTask = $task->where('status', 'complete')->count();
            $inProgressTask = $task->where('status', 'in_progress')->count();


            return view('dashboard', compact('totalTask', 'overDueTask', 'pendingTask', 'completeTask', 'inProgressTask'));
        }
    }
    /**
     * For User Login
     */
    public function userLogin(UserAuthRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active'
        ])) {
            return redirect()->route('dashboard');
        }

        $user = User::where('email', $request->email)->first();
        if ($user && $user->status == 'inactive') {
            return redirect()->back()->with('error', 'You are inactive')->withInput();
        }

        return redirect()->back()->with('error', 'Wrong email or Password')->withInput();
    }


    /**
     * For User Logout
     */
    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }
}
