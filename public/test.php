<?php

function() {








    if(request()->category_id && request()->tasks_status) {
//            if(request()->tasks_status === 'not taken') {
//                request()->tasks_status = null;
//            }



        $arr = [];



        foreach(AllUser::all() as $item) {

            $i = 1;
            foreach($item->tasks as $task) {


                if($task->pivot->task_status === request()->tasks_status && $task->category_id == request()->category_id) {
                    $task->userData = $task->users()->find($item->id);
                    $i++;

                    array_push($arr, $task);


                }








            }



        }

        $arr = collect($arr);



        $c = new CollectionHelper();
        $data =  $c->paginate($arr, request()->limit);















        return  new TaskCollection($data);


    }









    if(request()->category_id) {



        $arr = [];



        foreach(AllUser::all() as $item) {
            $i = 1;

            foreach($item->tasks as $task) {


                if($task->category_id == request()->category_id) {
                    $task->userData = $task->users()->find($item->id);
                    $i++;

                    array_push($arr, $task);


                }








            }



        }

        $arr = collect($arr);



        $c = new CollectionHelper();
        $data =  $c->paginate($arr, request()->limit);















        return  new TaskCollection($data);






    }

    if(request()->tasks_status) {

        if(request()->tasks_status === 'not taken') {
            request()->tasks_status = null;
        }



        $arr = [];



        foreach(AllUser::all() as $item) {

            $i = 1;
            foreach($item->tasks as $task) {


                if($task->pivot->task_status === request()->tasks_status) {
                    $task->userData = $task->users()->find($item->id);
                    $i++;

                    array_push($arr, $task);


                }








            }



        }

        $arr = collect($arr);



        $c = new CollectionHelper();
        $data =  $c->paginate($arr, request()->limit);















        return  new TaskCollection($data, request()->limit);


    }




// default data

//
//
//        $arr = [];
//
//
//        $i = 1;
//        foreach(AllUser::all() as $item) {
//
//
//            foreach($item->tasks as $task) {
//
//
//
//
//
//                $task->userData = $task->users()->first();
//                $i++;
//
//                array_push($arr, $task);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//            }
//
//
//
//        }
//
//        $arr = collect($arr);
//
//
//
//        $c = new CollectionHelper();
//        $data =  $c->paginate($arr, request()->limit);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//        return  new TaskCollection($data);









    $arr = [];



    foreach(AllUser::all() as $item) {

        $i = 1;
        foreach($item->tasks as $task) {

//                    if($task->status !== null) {

            $task->userData = $task->users()->find($item->id);
//                        $task->imagePivot = "image";
            $i++;

            array_push($arr, $task);


//                    }











        }



    }

//        return AllUser::find(2)->tasks;

    $arr = collect($arr);


//        return $arr;



    $c = new CollectionHelper();
    $data =  $c->paginate($arr, request()->limit);











}