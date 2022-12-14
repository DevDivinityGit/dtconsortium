<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTransactionHistoryController extends Controller
{
    public function getHistory()
    {
        return json_encode([
            'error' => false,
            'data' => request()->user()->transactions()->where('purpose_id', 2)->get(),
        ]);
    }
}
