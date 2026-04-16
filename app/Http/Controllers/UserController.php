<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        $userCount = $users->count();

        return view('users.index', compact('users', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $path = null;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('profile_images', 'public');
            }

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'role'     => $request->role,
                'status'   => $request->status,
                'profile_photo_path' => $path,
            ]);

            return redirect()->back()->with('success', 'User Created Successfully');
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        try {

            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'role'     => $request->role,
            ]);

            return redirect()->back()->with('success', 'User Updated Successfully');
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully');
    }


    /**
     * For Update User Status
     */
    public function userStatus($id)
    {
        $user = User::findOrFail($id);
        $newStatus = $user->status == 'active' ? 'inactive' : 'active';

        $user->update(['status' => $newStatus]);
        return redirect()->back()->with('success', "User Status $newStatus Successfully");
    }

    /**
     * For  User Profile Page
     */
    public function userProfile($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }
}