<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "attendance";


    public $timestamps = false;

}
