<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use DB;
//use Carbon\Carbon;
class UserTaskController extends Controller
{



    public function getHistory()
    {


        $ids = [];
        foreach(request()->user()->tasks as $tasks) {
            array_push($ids, $tasks->id);
        }



        $acceptedIds = [];
        foreach(request()->user()->tasks as $tasks) {

            if($tasks->pivot->task_status === 'Accepted')
            array_push($acceptedIds, $tasks->id);
        }




//      $week =    DB::table('tasks')
//        ->whereBetween('updated_at', [
//        \Carbon\Carbon::parse('last monday')->startOfDay(),
//        \Carbon\Carbon::parse('next friday')->endOfDay(),
//    ])
////          ->where('user_id', request()->user()->id)
////          ->where('status', 'accepted')
//              ->whereIn('id', $acceptedIds)
//
//          ->get();




        $stmt = "SELECT user_task.image as img, name, task_status, description,  user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE user_task.updated_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now() AND user_task.task_status = 'Accepted' AND user_task.user_id = :uid";


          $week = DB::select($stmt, ['uid' => request()->user()->id]);


             $weekEarning = [];
             $weekEarning['earning'] = 0;
          foreach($week as $w) {

              $weekEarning['earning'] += $w->earnings;



          }


















//        $yesterday = DB::table('tasks')
//            ->whereDay('updated_at', date('d',   strtotime("-1 day")))
//            ->where('status', 'accepted')
//            ->where('user_id', request()->user()->id)
//            ->whereIn('id', $acceptedIds)
//            ->get();



        $stmt = "SELECT user_task.image as img, name,  description, user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE day(user_task.updated_at) = :d
AND user_task.user_id = :uid AND user_task.task_status = 'Accepted'";


        $yesterday = DB::select($stmt, ['d' => date('d',  strtotime("-1 day")), 'uid' => request()->user()->id]);








        $yesterdayEarning = [];
        $yesterdayEarning['earning'] = 0;
        foreach($yesterday as $w) {

            $yesterdayEarning['earning'] += $w->earnings;



        }



















//        $today = DB::table('tasks')
//            ->whereDay('updated_at', date('d'))
//            ->where('status', 'accepted')
//            ->where('user_id', request()->user()->id)
//            ->whereIn('id', $acceptedIds)
//            ->get();








        $stmt = "SELECT user_task.image as img, name, task_status, description, user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE day(user_task.updated_at) = :d
AND user_task.user_id = :uid AND user_task.task_status = 'Accepted'";


        $today = DB::select($stmt, ['d' => date('d'), 'uid' => request()->user()->id]);









        $todayEarning = [];
        $todayEarning['earning'] = 0;
        foreach($today as $w) {

            $todayEarning['earning'] += $w->earnings;



        }


















//        $collectedToday = DB::table('tasks')
//            ->where('user_id', request()->user()->id)


//            ->whereDay('updated_at', date('d'))
//            ->whereIn('id', $ids)
//            ->get();





        $stmt = "SELECT user_task.image as img, name, task_status, description from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE day(user_task.updated_at) = :d
AND user_task.user_id = :uid";


        $collectedToday = DB::select($stmt, ['d' => date('d'), 'uid' => request()->user()->id]);























//        $month = DB::table('tasks')
//            ->whereMonth('updated_at', date('m'))
//            ->where('status', 'accepted')
//            ->where('user_id', request()->user()->id)
//            ->whereIn('id', $acceptedIds)
//            ->get();







        $stmt = "SELECT user_task.image as img, name, task_status, description, user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE month(user_task.updated_at) = :d
AND user_task.user_id = :uid AND user_task.task_status = 'Accepted'";


        $month = DB::select($stmt, ['d' => date('m'), 'uid' => request()->user()->id]);








        $monthEarning = [];
        $monthEarning['earning'] = 0;
        foreach($month as $w) {

            $monthEarning['earning'] += $w->earnings;



        }







































//        $last_month = DB::table('tasks')
//            ->whereMonth('updated_at', date('m',strtotime("-1 month")) )
//            ->where('status', 'accepted')
//            ->where('user_id', request()->user()->id)
//            ->whereIn('id', $acceptedIds)
//            ->get();







        $stmt = "SELECT user_task.image as img, name, task_status, description, user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE month(user_task.updated_at) = :d
AND user_task.user_id = :uid AND user_task.task_status = 'Accepted'";


        $last_month = DB::select($stmt, ['d' => date('m', strtotime("-1 month")), 'uid' => request()->user()->id]);








        $lastMonthEarning = [];
        $lastMonthEarning['earning'] = 0;
        foreach($last_month as $w) {

            $lastMonthEarning['earning'] += $w->earnings;



        }
















//        $today_remaiining = (int)request()->user()->plan()->limit - count($collectedToday);








        $stmt = "SELECT user_task.image as img, name, task_status, description, user_task.earning as earnings from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE user_task.user_id = :uid and user_task.task_status = 'Accepted'";


        $total = DB::select($stmt, ['uid' => request()->user()->id]);






        $totalEarning = [];
        $totalEarning['earning'] = 0;
        foreach($total as $w) {

            $totalEarning['earning'] += $w->earnings;



        }

















        $data['month'] = round($monthEarning['earning'], 2);
         $data['last_month'] = round($lastMonthEarning['earning'], 2);
         $data['today'] = round($todayEarning['earning'], 2);
         $data['yesterday'] = round($yesterdayEarning['earning'], 2);
         $data['collected_today'] = count($collectedToday);
         $data['week'] = round($weekEarning['earning'], 2);
         $data['total_reven'] = round($totalEarning['earning'], 2);
//         $data['today_remaining'] = (int)request()->user()->plan->limit - count($collectedToday);


        $data['today_remaining'] = ((int)request()->user()->plan->limit - count($collectedToday)) < 0 ? 0 : (int)request()->user()->plan->limit - count($collectedToday);










        return json_encode([
           'errors' => false,
           'data' => $data,

        ]);



    }


    public function submitTask()
    {



//       return request()->all();

        $id = request()->task_id;
        $task = Task::find($id);
         $r = request();






         $errors = [];

         if(!$task) {



             $errors[] = 'task not found';
             return json_encode(['errors' => true, 'data' => $errors]);




         } elseif($task->isAvailable === 0) {

             $errors[] = 'task not found';
             return json_encode(['errors' => true, 'data' => $errors]);


         }




         $userTasks = request()->user()->tasks;
         $ids = [];


         foreach($userTasks as $userTask) {
               array_push($ids, $userTask->id);


         }





         $userSubmittedTasks = Task::whereIn('id', $ids)->get();


         foreach($userSubmittedTasks as $tasks) {
             if($tasks->id === $task->id) {

                 $errors[] = 'task has already performed';
                 return json_encode(['errors' => true, 'data' => $errors]);





             }


         }










//        $today = DB::table('tasks')
//            ->whereDay('updated_at', date('d'))
//            ->where('status', 'accepted')
//            ->where('user_id', request()->user()->id)
//            ->get();
















//         if($userSubmittedTasks->count()>0) {
//             $errors[] = 'task has already performed';
//             return json_encode(['errors' => true, 'data' => $errors]);
//
//
//
//
//
//
//
//         }















//         if($task->status !== null && request()->user()->id === $task->user_id) {
//
//
//             $errors[] = 'task already performed';
//             return json_encode(['errors' => true, 'data' => $errors]);
//
//
//
//
//
//
//
//
//         }














         $userTasks = DB::table('user_task')
             ->whereDay('created_at', date('d'))
//             ->where('status', 'accepted')
//             ->where('user_id', request()->user()->id)
                 ->whereIn('task_id', $ids)
                  ->where('user_id', $r->user()->id)
             ->get();



//         return $userTasks;




         if(count($userTasks->toArray())>=(int)$r->user()->plan->limit) {

                    $errors[] = 'User met submitting tasks limit for today';
             return json_encode(['errors' => true, 'data' => $errors]);



         }
































        //        IMAGE UPLOAD

//        $img = isset($_SERVER['HTTP_IMAGE']) ? $_SERVER['HTTP_IMAGE'] : null;
        $img = request()->image;

        if ($img) {
            $folderPath = "uploads/";

            $base64Image = explode(";base64,", $img);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $file = $folderPath . uniqid() . '.'.$imageType;

            file_put_contents($file, $image_base64);




        } else {
            $errors[] = 'image is required';
        }
        //END IMAGE UPLOAD


        if(count($errors)>0) {


            return json_encode(['errors' => true, 'data' => $errors]);



        } else {

//            $task->update([
//               'status' => 'inprogress',
//                'user_id' => request()->user()->id,

//                'image' => $file,
//                'remaining' => (int) $task->remaining -=1,
//            ]);







                $price = request()->user()->plan->task_price;
            $attr = ['uid' => request()->user()->id, 'tid' => $task->id];
            $userId = request()->user()->id;
            DB::insert("insert into user_task(user_id, task_id, image, earning, created_at, updated_at) values('$userId', '$task->id', '$file', '$price', now(), now())");


//            return 101;





            $data = DB::select("select user_task.task_status as status, user_task.image as image, tasks.name as name,
tasks.description as description
from user_task
join tasks
on user_task.task_id = tasks.id
where user_task.user_id = :uid and user_task.task_id = :tid", $attr);






//            $task->users()->attach(request()->user()->id);




            return json_encode(['errors' => false, 'data' => $data]);













        }






















    }

    public function getTasks()
    {


        $errors = [];
        if(empty(request()->category_id)) {
            $errors[] = 'category field is required';
        }




        if(count($errors)>0) {


            return json_encode([
                'errors' => true,
                'data' => $errors,
            ]);
        }









        $cId = request()->category_id;

        $ids = [];


        foreach(request()->user()->tasks as $tasks) {
            array_push($ids, $tasks->id);


        }


        $data = Task::whereNotIn('id', $ids)
            ->where('category_id', request()->category_id)
            ->where('isAvailable', 1)
            ->get();







        $today_submitted = DB::table('user_task')
            ->where('user_id', request()->user()->id)
            ->whereDay('created_at', date('d'))
            ->get();



//
//        $domain = "https://".$_SERVER['SERVER_NAME'];
//
//
//        foreach($data as $d) {
//
//
//
//
//
//
//        }








        return response()->json([
            'errors' => false,
            'data' => $data,
            'submitted_tasks' => count($today_submitted),


        ]);


























    }

    public function getSubmittedTasks()
    {






        $stmt = "SELECT user_task.image as img, name, task_status, description,  user_task.created_at, user_task.updated_at,  tasks.category_id from user_task 
 JOIN tasks
ON tasks.id = user_task.task_id
WHERE user_task.user_id = :uid";


        $total = DB::select($stmt, ['uid' => request()->user()->id]);











        return json_encode([
            'errors' => false,
            'data' => $total,
        ]);





    }







}
