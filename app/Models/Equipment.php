<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = "equipments";

    public static function equipmentsTo ($view) {

        $equipments    = Equipment::all();
        return view($view, [

            "equipments"   => $equipments
        ]);
    }

    public static function equipmentTo ($view, $id)
    {
        $equipment     = Equipment::find($id);
        
        return view($view, [

            "equipment"   => $equipment
        ]); 
    }

}
