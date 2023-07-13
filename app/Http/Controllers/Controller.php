<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function folder() {
        return view('folder');
    }

    public function task() {
        return view('task');
    }
    
    public function edit_task() {
        return view('edit-task');
    }

    public function folder_create(Request $request) {
        $request->validate([
            'folder_name' => 'required',
       ]);
       return view('tasks');
        // return redirect()->route('tasks');
    }

    public function task_create(Request $request) {
        $request->validate([
            'task_name' => 'required',
            'deadline' => 'required',
       ]);
       return view('tasks');
        // return redirect()->route('tasks');
    }

    public function Course_Name(Articles $A,Request $request) {//コース名登録機能
        $input =$request->all();
        $rule = [
            'Course_Name' => 'required | max:20',
        ];

        $messages = [ 
            "required" => "必須入力です",  
            "max" => "20文字以内入力です",  
            // "digits_between" => "10桁または11桁で入力してください",  
            // "email" => "メールアドレスを正しく入力してください", 
            // "unique" =>"登録済みのメールアドレスです" ,
            // "string" => "文字を入力してください",  
            // "numeric" => "数字を入力してください",  
            // "strip_tags" => "入力できない文字が含まれています",  
        ];
        $validator = Validator::make($input, $rule,$messages);

        if ($validator->fails()) {
            return redirect('top')
                ->withErrors($validator)
                ->withInput();
        }

        $inputs =[
            '_token' =>$request->input('_token'),
            'title' =>$request->input('Course_Name'),
            'created_at' =>date("Y-m-d H:i:s")
        ];
        session()->put('vali', $input);
        $A->fill($inputs)->save();     
        return redirect()->route('top');
    }
}
