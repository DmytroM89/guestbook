<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Factories\TopFactory;

class TopController extends Controller
{
    public function index($top, $period = 'week') //$top = books;  $period = week
    {
//        var_dump($top);
        $factory = new TopFactory();
        
        $obj = $factory->factoryMethod($top);  //$obj = new Book();

        $result = $obj->top($period);   //$result = $list

        return view('top.index', [
            'top' => $top,
            'period' => $period,
            'result' => $result
        ]);
    }
}
