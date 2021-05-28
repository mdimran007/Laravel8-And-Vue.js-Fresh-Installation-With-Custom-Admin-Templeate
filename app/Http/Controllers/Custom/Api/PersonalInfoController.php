<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonalInfo;

class PersonalInfoController extends Controller
{
    public function show($id)
    {

        return PersonalInfo::find($id);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name' => ['nullable', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'mobile' => ['nullable', 'digits:11'],
            'email' => ['nullable', 'email'],
            'facebook' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'website' => ['nullable', 'url'],


        ]);

        $mydata = PersonalInfo::find($id);

        $mydata->name = $request->name;


        if ($request->title != "") {
            $mydata->title = $request->title;
        } else {
            $mydata->title = "";
        }

        if ($request->degree != "") {
            $mydata->degree = $request->degree;
        } else {
            $mydata->degree = "";
        }

        if ($request->dob != "") {
            $mydata->dob = $request->dob;
        } else {
            $mydata->dob = "";
        }

        if ($request->email != "") {
            $mydata->email = $request->email;
        } else {
            $mydata->email = "";
        }

        if ($request->mobile != "") {
            $mydata->mobile = $request->mobile;
        } else {
            $mydata->mobile = "";
        }

        if ($request->skype != "") {
            $mydata->skype = $request->skype;
        } else {
            $mydata->skype = "";
        }


        if ($request->whatsapp != "") {
            $mydata->whatsapp = $request->whatsapp;
        } else {
            $mydata->whatsapp = "";
        }


        if ($request->location != "") {
            $mydata->location = $request->location;
        } else {
            $mydata->location = "";
        }


        if ($request->freelance != "") {
            $mydata->freelance = $request->freelance;
        } else {
            $mydata->freelance = "";
        }


        if ($request->facebook != "") {
            $mydata->facebook = $request->facebook;
        } else {
            $mydata->facebook = "";
        }


        if ($request->youtube != "") {
            $mydata->youtube = $request->youtube;
        } else {
            $mydata->youtube = "";
        }


        if ($request->linkedin != "") {
            $mydata->linkedin = $request->linkedin;
        } else {
            $mydata->linkedin = "";
        }


        if ($request->twitter != "") {
            $mydata->twitter = $request->twitter;
        } else {
            $mydata->twitter = "";
        }

        if ($request->website != "") {
            $mydata->website = $request->website;
        } else {
            $mydata->website = "";
        }


        $mydata->save();
        return ['message' => 'success'];
    }
}
