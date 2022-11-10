<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function index ()
    {
        return Equipment::equipmentsTo("admin.equipments.equipmentsList");
    }


    public function create (Request $request)
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


    public function update (Request $request, $id)
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


    public function delete ($id) {

        if (Equipment::find($id))
        {
            Equipment::find($id)->delete();
        }

        return back();
    }

    // Managing Equipments
    public function manageEquipments ()
    {
        return Equipment::equipmentsTo("admin.equipments.manageEquipments");
    }

    // Editing Equipment

    public function editEquipment ($id)
    {
        if (!Equipment::find($id))
        {
            return redirect("dashboard");
        }  
        
        return Equipment::equipmentTo("admin.equipments.editEquipment", $id);
    }
}
