<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionCollection;


class TransactionController extends Controller
{



    public function reject($id)
    {
        $tr = Transaction::findOrFail($id);
        if($tr) {


            $tr->update(['status' => 'rejected']);

        }


        return 200;




    }






    public function approveWithdrawal($id)
    {




        $r = request();

        $admin = User::first();



        $tr = Transaction::find($id);






           if($tr->status == 'inprogress') {
//               return $tr;


               $user = User::find($r->user_id);


               if ($user->current_balance >= $tr->amount) {

                   $user->update([

                       'current_balance' => $user->current_balance - $tr->amount,


                   ]);


                   $tr->update([
                       'status' => 'approved',
                   ]);


                   $admin->update([
                       'current_balance' => $admin->current_balance - $tr->amount,

                   ]);


                   return 20;


               }


           }



           return 500;












    }
















    public function approve($id)
    {


        $r = request();



        $tr = Transaction::find($id);
        if($tr->status === 'inprogress') {


            if ($r->user_id) {
                $user = User::find($r->user_id);

                if ((int)$tr->purpose_id === 1) {

                    if ($user->current_balance >= $tr->amount) {

                        $user->update([

                            'current_balance' => $user->current_balance - $tr->amount,


                        ]);


                    }


                    $tr->update([
                        'status' => 'approved',
                    ]);


                    return 200;


                }


            }


            $tr->update([
                'status' => 'approved',
            ]);


            User::first()->update([
                'current_balance' => User::first()->current_balance += $tr->amount,
            ]);


            $tr->user()->update(['current_balance' => $tr->user->current_balance += $tr->amount]);


            return 200;


        }






    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = request();
        $status = $r->tasks_status;



        if($status) {


            return  new TransactionCollection(Transaction::where('status', $status)
                ->where('is_deleted', 0)
                ->orderBy('id', 'desc')->paginate($r->limit));






        }


        return new TransactionCollection(Transaction::where('is_deleted', 0)
        ->orderBy('id', 'desc')->paginate($r->limit));






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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
