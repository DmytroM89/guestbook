<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $success = '';
        if ($request->isMethod('post')) {
            $request->flash();
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:100',
                'email' => 'required|max:150',
                'msg' => 'required|max:3000',
                'img' => 'mimes:jpeg,bmp,png'
            ]);
            
            if ($validator->fails()) {
                return view('default.index', ['errors' => $validator->errors()->all()]);
            }
            
            if ($request->hasFile('img')) {
                $request->file('img')->move('upload', $request->file('img')->getClientOriginalName());
            }
            $success = 'Form sended successfull';
        }
        
        return view('default.index', ['success' => $success]);
    }
    
    
}
