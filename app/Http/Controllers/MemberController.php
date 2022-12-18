<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Member::membersTo("admin.members.membersList");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.members.addMember");
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
            "name"      => "required|min:5",
            "username"  => "required|min:5",
            "gender"    => "required",
            "plan"      => "required",
            "phone"     => "required",
            "service"   => "required",
            "date"      => "required",
            "amount"    => "required",
        ]);

        $member = new Member();

        $member->name       = $request->name;
        $member->username   = $request->username;
        $member->gender     = $request->gender;
        $member->address    = $request->address;
        $member->plan       = $request->plan;
        $member->contact    = $request->phone;
        $member->services   = $request->service;
        $member->reg_date   = $request->date;
        $member->amount     = $request->amount;
        if (Auth::user()->role == "admin") {

            $member->status = "active";
        }

        $member->save();
        return back()->with("success", "The member has been added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Showing Manage Page
    // public function show()
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Member::memberTo("admin.members.editMember", $id);
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
        $request->validate([
            "name"      => "required|min:5",
            "username"  => "required|min:5",
            "gender"    => "required",
            "plan"      => "required",
            "phone"     => "required",
            "service"   => "required",
            "date"      => "required",
            "amount"    => "required",
        ]);

        $member             = Member::find($request->id);
        $member->name       = $request->name;
        $member->username   = $request->username;
        $member->gender     = $request->gender;
        $member->address    = $request->address;
        $member->plan       = $request->plan;
        $member->contact    = $request->phone;
        $member->services   = $request->service;
        $member->reg_date   = $request->date;
        $member->amount     = $request->amount;

        $member->save();
        return back()->with("success", "The member has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Member::find($id))
        {
            Member::find($id)->delete();
        }

        return back();
    }

    // Activating Member
    public function activate ($id)
    {
        $member = Member::find($id);
        if ($member)
        {
            $member->status = "active";
            $member->save();
            return back();
            
        }

        return back();
    }

    
    // Managing Members
    public function manageMembers ()
    {
        return Member::membersTo("admin.members.manageMember");
    }

    // Editing Member Data
    public function editMember ($id)
    {
        return Member::memberTo("admin.members.editMember", $id);
    }

    // Attendance 
    public function attendance ()
    {
        return Member::membersTo("attendance");
    }

    // Editing Member Progress
    public function editProgress($id)
    {
        if(Member::find($id))
        {
            $member     = Member::find($id);
            return view("memberProgress", [
                "member"    => $member
            ]);
        }

        return back();
    }

    // Member Progress
    public function memberProgress ()
    {
        return Member::membersTo("manageMemberProgress");
    }

    // Updating Member Progress
    public function updateProgress(Request $request)
    {
        if(Member::find($request->id))
        {
            $member                 = Member::find($request->id);
            $member->ini_weight     = $request->ini_weight;
            $member->curr_weight    = $request->curr_weight;
            $member->ini_body_type  = $request->ini_body_type;
            $member->curr_body_type = $request->curr_body_type;
            $member->save();

        }

        return back();
    }


    // Payment
    public function payments ()
    {
        return Member::membersTo("payments");
    }

    public function paymentData ($id)
    {

        if(Member::find($id))
        {
            return Member::memberTo("paymentData", $id);
        }

        return back();

    }

    // Making Payment
    public function makePayment (Request $request)
    {
        if(Member::find($request->id))
        {
            $member                 = Member::find($request->id);
            $member->amount         = $request->amount;
            $member->plan           = $request->plan;
            $member->status         = $request->status;
            $member->paid_date      = date("Y-m-d");
            $member->save();
            return back()->with("success", "Payment made successfully");
        }

        return back();

    }

    // Status

    public function status ()
    {
        return Member::membersTo("admin.members.memberStatus");
    }

    // Reports

    public function reports ()
    {
        return Member::membersTo("reports");
    }

    public function memberReport ($id)
    {
        return Member::memberTo("memberReport", $id);
    }

    public function progressReports()
    {
        return Member::membersTo("progressReports");
    }

    public function memberProgressReport ($id)
    {
        return Member::memberTo("memberProgressReport", $id);
    }

}
