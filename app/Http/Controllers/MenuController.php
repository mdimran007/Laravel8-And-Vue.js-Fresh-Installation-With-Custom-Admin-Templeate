<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($id)
     {

          return Menu::find($id);
     }

     public function update(Request $request, $id)
    {


          $mydata = Menu::find($id);

        if ($request->home == 1) {
            $mydata->home = $request->home;
        } else {
            $mydata->home = "";
        }

          if($request->about==1){
            $mydata->about = $request->about;
          }else{
            $mydata->about = "";
          }

        if ($request->portfolio == 1) {
            $mydata->portfolio = $request->portfolio;
        } else {
            $mydata->portfolio = "";
        }

        if ($request->services == 1) {
            $mydata->services = $request->services;
        } else {
            $mydata->services = "";
        }

        if ($request->videos == 1) {
            $mydata->videos = $request->videos;
        } else {
            $mydata->videos = "";
        }

        if ($request->blog == 1) {
            $mydata->blog = $request->blog;
        } else {
            $mydata->blog = "";
        }

        if ($request->contact == 1) {
            $mydata->contact = $request->contact;
        } else {
            $mydata->contact = "";
        }
          
          
          
          
          


          $mydata->save();
          return ['message' => 'success'];

      
       
    }
}
