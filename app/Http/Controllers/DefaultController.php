<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

use App\Models\Messages;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $success = '';


        //Пост
        if ($request->isMethod('post')) {
            $request->flash();
            $data = $request->all();

//            dd($data);

            $this->validate($request, [
                'username' => 'required|max:100',
                'email' => 'required|max:150',
                'msg' => 'required|max:3000',
                'img' => 'mimes:jpeg,bmp,png',
                'g-recaptcha-response' => 'required|recaptcha'
            ]);



//            $validator = Validator::make($request->all(), [
//                'username' => 'required|max:100',
//                'email' => 'required|max:150',
//                'msg' => 'required|max:3000',
//                'img' => 'mimes:jpeg,bmp,png',
//                'g-recaptcha-response' => 'required|recaptcha'
//            ]);
//
//            if ($validator->fails()) {
//                return view('default.index', ['errors' => $validator->errors()->all()]);
//            }

            $messages = new Messages();
            $messages->name = $data['username'];
            $messages->email = $data['email'];
            $messages->msg = $data['msg'];
            $messages->url = $data['url'];

            if ($request->hasFile('img')) {
                $request->file('img')->move('upload', $request->file('img')->getClientOriginalName());
                $messages->img = $request->file('img')->getClientOriginalName();
            }

            $messages->save();


            $success = 'Form sended successfull';
        }
//конец поста


        $allMessages = Messages::orderBy('created_at', 'desc')->paginate(3);
        
        return view('default.index', ['success' => $success, 'messages' => $allMessages]);
    }
    
    
}
