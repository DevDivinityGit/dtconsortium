<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class UserUsdtAddressController extends Controller
{
    public function get()
    {
        return json_encode([
           'errors' => false,
           'data' => Address::first(),

        ]);
    }
}
