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
        if(isset($_GET['searchname'])){
            $search_text = $_GET['searchname'];
            $department = $request->department;
            if ($request->department != 'No Department'){
                $contacts = DB::table('contacts')->where('name','like','%'.$search_text.'%')->where('department','like','%'.$department.'%')->orderBy('name', 'desc')->paginate(4);
            }
            else {
                $contacts = DB::table('contacts')->where('name','like','%'.$search_text.'%')->orderBy('name', 'desc')->paginate(4);
            }
            $contacts ->appends($request->all()) ;
            return view('contacts',[
                'contacts'=>$contacts,
                'request'=>$search_text,
            ]);
        }else{
            return view('contacts',[
                'contacts' => DB::table('contacts')->orderBy('name', 'desc')->paginate(4)
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
        $cont -> info = $request->input('info');
        $cont -> department = $request->input('department');

        $cont ->save();
        return redirect('contacts')->with('success', 'professor added succefully');

    }
    public function delete($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect('contacts')->with('success', 'deleted successfully');
    }
    public function edit(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'department'=>'required',
        ]);

        
        
        if ($request->input('department') == 'choose department')
        {
            return redirect('contacts')->with('error', 'editing failed, please provide a department');
        }else{
            $task = DB::table('contacts')->where('id', $request->input('cid'))
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'info' => $request->input('info'),
                'department' => $request->input('department')
            ]);

        }      
            return redirect('contacts')->with('success', 'Professor edited successfully');
        
       
    }
}
