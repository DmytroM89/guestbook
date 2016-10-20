<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Autors;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Autors::all();
        return response()->json($authors);
    }

    public function insert(Request $request)
    {
        $params = $request->json()->all();
        return response()->json($params);
    }
}
