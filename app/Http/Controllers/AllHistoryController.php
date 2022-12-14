<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AllHistoryController extends Controller
{
    public function get()
    {
        $r = request();
        $user = $r->user();





        $stmt = "select plans.*, user_plan.plan_id as planId
from plans
join user_plan
on plans.id = user_plan.plan_id
where user_plan.user_id = :userId";


        $plans = DB::select($stmt, ['userId' =>  $user->id]);




         $attr = ['userId' => $user->id];




      $q = "select tasks.*, user_task.earning as earnings
from tasks
join user_task
on user_task.task_id = tasks.id
where user_task.user_id = :userId
and user_task.task_status = 'accepted'";




      $tasks = DB::select($q, $attr);





      $q = "select * from transactions
where user_id = :userId
and purpose_id = 1";


      $withdrawal = DB::select($q, $attr);





        $q = "select * from transactions
where user_id = :userId
and purpose_id = 2";


        $recharge = DB::select($q, $attr);














        $data = [];
      $data['plans'] = $plans;
      $data['tasks'] = $tasks;
      $data['withdrawals'] = $withdrawal;
      $data['recharge'] = $recharge;


      return json_encode([
          'errors' => false,
          'data' => $data,

      ]);



















    }
}
