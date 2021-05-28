<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMsg;
use Illuminate\Validation\Rule; 

class ContactMsgController extends Controller
{
    public function index()
    {
        return ContactMsg::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_name' => 'required|alpha',
            'l_name' => 'required|alpha',
            //'email' => 'required|unique:services,service_title',
            //'email' => 'required|email|unique:contact_msgs,email',
            'email' =>
            [
                'required',
                'email',
                Rule::unique('contact_msgs')->where(function ($query) {
                    $query->where('status', '=', 'Unread');
                })
            ],
            //'mobile' => 'required|numeric|digits:11',
            'mobile' => 'required|digits:11',
            'msg' => 'required'
        ]);

        $mydata = new ContactMsg();
        $mydata->f_name = $request->f_name;
        $mydata->l_name = $request->l_name;
        $mydata->email = $request->email;
        $mydata->mobile = $request->mobile;
        $mydata->msg = $request->msg;
        $mydata->status = "Unread";
        $mydata->save();
        return ['message' => 'success'];
    }

    public function show($id)
    {
        $mydata = ContactMsg::find($id);
        $mydata->status = "Read";
        $mydata->save();
        return $mydata;

        
    }

    public function destroy($id)
    {
        $msg = ContactMsg::find($id);
        $msg->delete();
    }
}
