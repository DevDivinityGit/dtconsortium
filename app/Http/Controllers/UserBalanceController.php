<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBalanceController extends Controller
{
    public function get()
    {

           $b = round(request()->user()->current_balance, 2);

           return json_encode(['errors' => false, 'data' => $b]);
    }
}
