<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Test;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;


    public static function membersTo ($view) {

        $members    = Member::all();
        return view($view, [

            "members"   => $members
        ]);
    }

    public static function memberTo ($view, $id)
    {
        $member     = Member::find($id);
        
        return view($view, [

            "member"   => $member
        ]); 
    }
}
