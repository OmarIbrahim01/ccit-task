<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', ['users' => $users]);
    }

    public function searchUsers(Request $request)
    {
        $request->validate([
            'searchTerm' => 'required',
        ]);

        $searchTerm = $request->searchTerm;
        $users_by_name = User::where('name', 'LIKE', "%{$searchTerm}%")->get();
        $users_by_email = User::where('email', 'LIKE', "%{$searchTerm}%")->get();
        $users = $users_by_name->merge($users_by_email);
        return view('admin.search_users', ['users' => $users, 'searchTerm' => $searchTerm]);
    }


    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = false;
        $user->update();

        session()->flash('message', 'User Have Been Deactivated Successfully');
        return redirect()->back();
    }

    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = true;
        $user->update();

        session()->flash('message', 'User Have Been Activated Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        session()->flash('message', 'User Have Been Updated Successfully');
        return redirect()->route('admin_dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('message', 'User Have Been Deleted Successfully');
        return redirect()->back();
    }
}
