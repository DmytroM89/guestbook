<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TopController extends Controller
{
    public function index($top, $period = 'week')
    {
        return view('top.index', [
            'top' => $top,
            'period' => $period
        ]);
    }
}
