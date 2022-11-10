<?php

namespace App\Http\Traits;

use App\Models\Equipment;
use App\Models\User;
use App\Models\Member;


    trait GymTraits {

        // Function to Get Active Members
        public static function activeMembers () {

            return Member::all()->where("status", "active");
        }

        // Function to Get Pending Members
        public static function pendingMembers () {
            
            return Member::all()->where("status", "pending");

        }

        // Function To Get Staff Users
        public static function staffUsers () {

            return User::all()->where('role', '!==', 'admin');

        }
        
        // Function To Get Total Earnings
        public static function totalEarnings () {

            $members = Member::all();
            $earnings = 0;
            foreach($members as $member) {
                $earnings += $member->amount;
            }
            
            return $earnings;

        }

        // Function To Get Total Earnings
        public static function totalExpenses () {

            $equipments = Equipment::all();
            $expenses = 0;
            foreach($equipments as $equipment) {
                $expenses += $equipment->cost;
            }
            return $expenses;

        }

    }