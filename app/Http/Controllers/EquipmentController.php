<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipment::equipmentsTo("admin.equipments.equipmentsList");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipments.addEquipment');
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
            "description"   => "required|min:5",
            "date"          => "required",
            "quantity"      => "required",
            "v_name"        => "required",
            "contact"       => "required",
            "address"       => "required",
            "cost"          => "required",
        ]);

        $equipment = new Equipment();

        $equipment->name            = $request->name;
        $equipment->description     = $request->description;
        $equipment->date            = $request->date;
        $equipment->quantity        = $request->quantity;
        $equipment->vendor          = $request->v_name;
        $equipment->contact         = $request->contact;
        $equipment->address         = $request->address;
        $equipment->cost            = $request->cost * $request->quantity;

        $equipment->save();

        return back()->with("success", "The equipment has been added successfully.");
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
        if (!Equipment::find($id))
        {
            return redirect("dashboard");
        }  
        
        return Equipment::equipmentTo("admin.equipments.editEquipment", $id);
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
            "name"          => "required|min:5",
            "description"   => "required|min:5",
            "date"          => "required",
            "quantity"      => "required",
            "v_name"        => "required",
            "contact"       => "required",
            "address"       => "required",
            "cost"          => "required",
        ]);

        $equipment = Equipment::find($id);

        $equipment->name            = $request->name;
        $equipment->description     = $request->description;
        $equipment->date            = $request->date;
        $equipment->quantity        = $request->quantity;
        $equipment->vendor          = $request->v_name;
        $equipment->contact         = $request->contact;
        $equipment->address         = $request->address;
        $equipment->cost            = $request->cost * $request->quantity;


        $equipment->save();
        return back()->with("success", "The equipment has been updated successfully.");
    }

       // Managing Equipments
       public function manageEquipments ()
       {
           return Equipment::equipmentsTo("admin.equipments.manageEquipments");
       }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Equipment::find($id))
        {
            Equipment::find($id)->delete();
        }

        return back();
    }
}
