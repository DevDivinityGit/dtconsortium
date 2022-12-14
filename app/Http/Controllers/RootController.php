<?php

namespace App\Http\Controllers;

use App\Plan;
use App\PromotionImage;
use App\Task;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\TransactionCollection;

class RootController extends Controller
{



    public function getWithdrawalTransactions()
    {


        $r = request();
        $status = $r->tasks_status;
        $purposeId = $r->purpose_id;







        if($purposeId && $status) {


            return  new TransactionCollection(Transaction::where('purpose_id', $purposeId)
                ->where('status', $status)
                ->where('is_deleted', 0)
                ->where('purpose_id', 1)
                ->orderBy('id', 'desc')->paginate($r->limit));



        }









        if($purposeId) {


            return  new TransactionCollection(Transaction::where('purpose_id', $purposeId)
                ->where('is_deleted', 0)
                ->where('purpose_id', 1)
                ->orderBy('id', 'desc')->paginate($r->limit));



        }



        if($status) {


            return  new TransactionCollection(Transaction::where('status', $status)
                ->where('is_deleted', 0)
                ->where('purpose_id', 1)
                ->orderBy('id', 'desc')->paginate($r->limit));






        }


        return new TransactionCollection(Transaction::where('is_deleted', 0)
            ->where('purpose_id', 1)
            ->orderBy('id', 'desc')->paginate($r->limit));









    }





    public function getTransactions()
    {
        $r = request();
        $status = $r->tasks_status;
        $purposeId = $r->purpose_id;







        if($purposeId && $status) {


            return  new TransactionCollection(Transaction::where('purpose_id', $purposeId)
                ->where('status', $status)
                ->where('is_deleted', 0)
                ->where('purpose_id', 2)
                ->orderBy('id', 'desc')->paginate($r->limit));



        }









        if($purposeId) {


            return  new TransactionCollection(Transaction::where('purpose_id', $purposeId)
                ->where('is_deleted', 0)
                ->where('purpose_id', 2)
                ->orderBy('id', 'desc')->paginate($r->limit));



        }



        if($status) {


            return  new TransactionCollection(Transaction::where('status', $status)
                ->where('is_deleted', 0)
                ->where('purpose_id', 2)
                ->orderBy('id', 'desc')->paginate($r->limit));






        }


        return new TransactionCollection(Transaction::where('is_deleted', 0)
            ->where('purpose_id', 2)
        ->orderBy('id', 'desc')->paginate($r->limit));






    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['users'] = User::all()->count()-1;
        $data['plans'] = Plan::all()->count();
        $data['tasks'] = Task::all()->count();
        $data['submitted_tasks'] = DB::table('user_task')->get()->count();




//        $totalBalance =  0;
//
//        $total = Transaction::where('status', 'approved')->get();
//
//
//
//
//        foreach($total as $t) {
//
//            $totalBalance += $t->amount;
//
//
//        }


         $admin = User::first();
        $data['total_balance'] = $admin->current_balance;




        $totalBalance =  0;

        $total = Transaction::where('status', 'inprogress')->get();




        foreach($total as $t) {

            $totalBalance += $t->amount;


        }



        $data['pending_balance'] = $totalBalance;
        $data['promotion_images'] = PromotionImage::all()->count();
        $data['transactions_number'] = Transaction::all()->count();




        $arr = [];


        foreach(Plan::all() as $item) {
           $x = DB::select("select count(*) as n_of_users from users where plan_id = :pid", ['pid' => $item->id]);
            $arr[$item->name] = $x[0]->n_of_users;


        }




        $data['plans_data'] = $arr;

























        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
