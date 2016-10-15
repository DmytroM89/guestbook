<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Factories\TopFactory;

class TopController extends Controller
{
    public function index($top, $period = 'week')
    {
        $factory = new TopFactory();
        $obj = $factory->factoryMethod($top);

        $result = $obj->top($period);
        return view('top.index', [
            'top' => $top,
            'period' => $period,
            'result' => $result
        ]);
    }
}
