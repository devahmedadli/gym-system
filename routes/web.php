<?php

use App\Http\Controllers\AttendanceController;
use App\Models\User;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Equipment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

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
Route::get("/logout", [UserController::class, "logout"]);

Route::middleware('auth')->group(function () {

    // Admin routes
    Route::prefix("/admin")->group(function(){

        // Dashboard
        Route::get("/dashboard", [UserController::class, "index"])->name("admin.dashboard");
        
        // Members
        Route::get("/membersList", [MemberController::class, "index"]);

        Route::view("/add-member", "admin.members.addMember"); 

        Route::post("/create-member", [MemberController::class, "create"])->name("createMember");

        Route::get('/manage-member', [MemberController::class, "manageMembers"]);

        Route::get("/edit-member/{id}", [MemberController::class, "editMember"]);

        Route::post("/update-member", [MemberController::class, "update"]);

        Route::get("/activate-member/{id}", [MemberController::class, "activate"]);

        Route::get('/remove-member/{id}', [MemberController::class, "delete"]);

        // Equipments
        Route::get("/equipments-list", [EquipmentController::class, "index"]);

        Route::view("/add-equipment", 'admin.equipments.addEquipment');

        Route::post("/new-equipment", [EquipmentController::class, "create"]);
        
        Route::get("/manage-equipments", [EquipmentController::class, "manageEquipments"]);

        Route::get("/edit-equipment/{id}", [EquipmentController::class, "editEquipment"]);
        
        Route::post("/update-equipment/{id}", [EquipmentController::class, "update"]);

        Route::get("/remove-equipment/{id}", [EquipmentController::class, "delete"]);

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
        Route::get("/manage-staff", [UserController::class, "manageStaff"]);

        Route::view("/add-user", "staff.addstaffUser");

        Route::post("/create-staff", [UserController::class, "create"]);

        Route::get("/edit-staff/{id}", [UserController::class, "editStaff"]);

        Route::post("/update-staff", [UserController::class, "update"]);

        Route::get("/remove-staff/{id}", [UserController::class, "remove"]);

        // Reports 
        Route::get("/reports", [MemberController::class, "reports"]);
        
        Route::get("/member-report/{id}", [MemberController::class, "memberReport"]);
        
        Route::get("/progress-reports", [MemberController::class, "progressReports"]);
        
        Route::get("/member-progress-report/{id}", [MemberController::class, "memberProgressReport"]);
    });

});

