<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plan;

class UserPlanController extends Controller
{
    public function getPlans()
    {

        return  json_encode([
            'errors' => false,
            'data' => Plan::all(),


        ]);
    }

    public function updated()
    {






       $errors = [];

        if(empty(request()->plan_id)) {
            $errors[] = 'plan key is not sent';
        }



        $plan = Plan::find(request()->plan_id);


        if(!$plan) {
            $errors[] = 'plan not found';




        }



        if(count($errors)>0) {
            return json_encode(['errors' => true, 'data' => $errors]);

        }








        $user = request()->user();




        if($plan->price > $user->plan->price) {
            $balance = request()->user()->current_balance -
                ($plan->price - $user->plan->price);

        } else {

            $balance = request()->user()->current_balance +
                ($user->plan->price - $plan->price);


        }










        if($balance >= 0) {

            $user->update(['current_balance' => $balance]);


            if($user->update(['plan_id' => $plan->id])) {



              $attr = ['userId' => $user->id, 'planId' => $plan->id];

              \DB::insert("insert into user_plan(user_id, plan_id, created_at, updated_at) values(:userId, :planId, now(), now());", $attr);









                return json_encode(['errors' => false, 'data' => $plan]);
            }


        } else {

            return json_encode(['errors' => true, 'data' => "insufficient balance"]);


        }











    }


    public function getCurrentPlan()
    {

        return json_encode([
           'errors' => false,
           'data' => request()->user()->plan,

        ]);


    }

















}
