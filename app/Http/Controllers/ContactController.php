<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('emailForm');
    }
    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        if($this->isonline()){
            $mail_data = [
                'recipient'=>'realblitzraid@gmail.com',
                'fromemail'=>$request->email,
                'fromname'=>$request->name,
                'subject'=>$request->subject,
                'body'=>$request->message
            ];
            \Mail::send('email-template', $mail_data, function($message) use ($mail_data) {
                $message->to($mail_data['recipient']);
                $message->from($mail_data['fromemail'],$mail_data['fromname']);
                $message->subject($mail_data['subject']);
                
                
            });
            return redirect()->back()->with('success', 'E-mail Sent!');

        }else{
            return redirect()->back()->withInput()->with('error', 'check your internet connection');
        }
    }

    public function isonline($site = "https://youtube.com/")
    {
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
