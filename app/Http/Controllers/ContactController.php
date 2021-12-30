<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index($id)
    {
        $contacts = DB::table('contacts')
                    ->where('id', $id)
                    ->get()
                ;
        foreach ($contacts as $contact) {
            $targetemail = $contact->email;
        }
        //could be done better without the foreach loop, need to know how
        return view('emailForm')->with('targetemail', $targetemail);
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
                'recipient'=>$request->targetemail,
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
