<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Traits\GymTraits;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public static function index() {

        $Cardio_nums    = count(Member::all()->where("services", "Cardio"));
        $Sauna_nums     = count(Member::all()->where("services", "Sauna"));
        $Fitness_nums   = count(Member::all()->where("services", "Fitness"));

        // return  $services_nums;
        return view("admin.dashboard", [

            "present"       => Member::all()->where("check_in", 1),
            "active"        => User::activeMembers(),
            "pending"       => User::pendingMembers(),
            "registered"    => Member::all(),
            "earnings"      => User::totalEarnings(),
            "expenses"      => User::totalExpenses(),
            "staff"         => User::staffUsers(),
            "trainers"      => User::all()->where("role", "trainer"),
            "equipments"    => Equipment::all(),
            "services_num"  => [$Cardio_nums, $Sauna_nums, $Fitness_nums],
            "male"          => count(Member::all()->where("gender", "male")),
            "female"        => count(Member::all()->where("gender", "female")),
            "roles"         => [
                count(User::all()->where("role", "front-desk")),
                count(User::all()->where("role", "cashier")),
                count(User::all()->where("role", "trainer")),
                count(User::all()->where("role", "manager")),
                count(User::all()->where("role", "gym-assistant")),
            ],
            

        ]);
        
    } 

    public function create (Request $request)
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

        if (!empty(User::all()->where("username", $request->username)))
        {
            // return User::all()->where("username", $request->username);
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

    // Remove
    public function remove ($id)
    {
        if(User::find($id))
        {
            $user   = User::find($id);
            $user->delete();
        }

        return back();
    }

    public function update (Request $request)
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

    // Logging out the user
    public function logout (Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }

    // Managing Staff
    public function manageStaff ()
    {
        $staff      = User::all()->where("role", "!=", "admin");

            return view("staff.manageStaff", [

                "staff"     => $staff
            ]);
    }

    public function editStaff ($id)
    {
        $user   = User::find($id);

            return view("staff.editStaff", [

                "user"  => $user
            ]);
    }
}
