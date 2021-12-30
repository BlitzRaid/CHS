<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contacts;




class ContactsController extends Controller
{
    //this function is redundant at this point
    public function search(Request $request)
    {
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $contacts = DB::table('contacts')->where('name','like','%'.$search_text.'%')->paginate(4);
            $contacts ->appends($request->all()) ;
            return view('contacts',[
                'contacts'=>$contacts,
                'request'=>$search_text,
            ]);
        }else{
            return view('contacts',[
                'contacts' => DB::table('contacts')->paginate(4)
            ]);
        }
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'department'=>'required',
        ]);


        $cont = new Contact();
        $cont -> name = $request->input('name');
        $cont -> email = $request->input('email');
        $cont -> department = $request->input('department');

        $cont ->save();
        return redirect('contacts')->with('success', 'professor added succefully');

    }
    public function delete($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect('contacts')->with('success', 'deleted succcesffuly');
    }
    public function edit($id, Request $request)
    {
        
    }
}
