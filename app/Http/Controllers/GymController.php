<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
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

    
    // Logging out the user
    public function logout (Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
