<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff      = User::all()->where("role", "!=", "admin");

            return view("staff.manageStaff", [

                "staff"     => $staff
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.addstaffUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"          => "required|min:5",
            "username"      => "required|min:5",
            "password"      => "required|min:6",
            "gender"        => "required",
            "contact"       => "required",
            "address"       => "required",
            "role"          => "required",
        ]);

        if (count(User::all()->where("username", $request->username)) !== 0)
        {
            return back()->with("error", "username is not available");
        }

        $user               = new User();
        $user->username     = $request->username;
        $user->password     = bcrypt($request->password);
        $user->full_name    = $request->name;
        $user->gender       = $request->gender;
        $user->contact      = $request->contact;
        $user->address      = $request->address;
        $user->role         = $request->role;

        $user->save();
        return back()->with("success", "User has been successfully added");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user   = User::find($id);

        return view("staff.editStaff", [

            "user"  => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (User::find($request->id))
        {
            $request->validate([
                "name"      => "required|min:5",
                "username"  => "required|min:5",
                "gender"    => "required",
                "role"      => "required",
                "address"   => "required",
                "contact"   => "required",
            ]);
    
            $user             = User::find($request->id);
            $user->full_name  = $request->name;
            $user->username   = $request->username;
            $user->gender     = $request->gender;
            $user->role       = $request->role;
            $user->address    = $request->address;
            $user->contact    = $request->contact;
    
            $user->save();
            return back()->with("success", "The User has been updated successfully.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id))
        {
            $user   = User::find($id);
            $user->delete();
        }

        return back();
    }
}
