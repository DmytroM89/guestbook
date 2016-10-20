<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Autors;
use App\Http\Requests;
use Validator;
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
        $params = $request->all();

        $validator = Validator::make($params, [
            'name' => 'required|max:100|unique:autors'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'author name invalid or exist'
            ]);
        } else {
            Autors::create($params);
            return response()->json([
                'status' => 'success',
                'message' => 'ok',
                'result' => Autors::all()

            ]);
        }


//        $autor = new Autors();
//        $autor->name = $params['authorName'];
//        $autor->save();


    }
}
