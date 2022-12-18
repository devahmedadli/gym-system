<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Equipment;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\authController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::view('/', 'index')->name('login');
Route::get('/login', [authController::class, "login"]);

// Logout
Route::get("/logout", [GymController::class, "logout"]);

Route::middleware('auth')->group(function () {

    // Admin routes
    Route::prefix("/admin")->group(function(){

        // Dashboard
        Route::get("/dashboard", [GymController::class, "index"])->name("admin.dashboard");
        

        // Members
        Route::resource('members', MemberController::class)->except(['show']);
        
        Route::get('/manage-member', [MemberController::class, "manageMembers"]); 

        // Equipments

        Route::resource('equipments', EquipmentController::class)->except(['show']);
        
        Route::get("/manage-equipments", [EquipmentController::class, "manageEquipments"]); //manage


        // Attendance

        Route::get("/attendance", [MemberController::class, "attendance"]);

        Route::get("/check-in/{id}", [AttendanceController::class, "checkIn"]);
        
        Route::get("/check-out/{id}", [AttendanceController::class, "checkOut"]);

        Route::get("/attendance-view", [AttendanceController::class, "viewAttendance"]);

        // Manage Member Progress

        Route::get("/member-progress", [MemberController::class, "memberProgress"]);

        Route::get("/edit-progress/{id}", [MemberController::class, "editProgress"]);

        Route::post("/update-progress", [MemberController::class, "updateProgress"]);
        
        // Payments
        Route::get("/payments", [MemberController::class, "payments"]);

        Route::get("/payment/{id}", [MemberController::class, "paymentData"]);

        Route::post("/make-payment", [MemberController::class, "makePayment"]);

        // Member Status
        Route::get("/member-status", [MemberController::class, "status"]);

        // Staff
        Route::resource('staff', UserController::class)->except(['show']);

        // Reports 
        Route::get("/reports", [MemberController::class, "reports"]);
        
        Route::get("/member-report/{id}", [MemberController::class, "memberReport"]);
        
        Route::get("/progress-reports", [MemberController::class, "progressReports"]);
        
        Route::get("/member-progress-report/{id}", [MemberController::class, "memberProgressReport"]);
    });

});

