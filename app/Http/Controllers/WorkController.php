<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function workout()
    {
        return date('d',   strtotime("-1 day"));
    }
}
