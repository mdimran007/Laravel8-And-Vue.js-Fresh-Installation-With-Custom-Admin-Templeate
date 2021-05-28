<?php

namespace App\Http\Controllers\Custom\Api;

use App\Models\Home;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{

     public function show($id)
     {

          return Home::find($id);
     }


    public function update(Request $request, $id)
    {

          //dd($request->all());

          $this->validate($request, [
               
               'full_name' => 'required',
               'work_title' => 'required',
               
          ]);

          $mydata = Home::find($id);

          //images 
          if($request->images != $mydata->images) {


          $exploded = explode(',', $request->images);
          $decoded = base64_decode($exploded[1]);

          if (str_contains($exploded[0], 'jpeg')) {
               $extension = 'jpg';
          } else {
               $extension = 'png';
          }

          $today = date("_Ymd_His");

          $fileName = Str::random(8) . $today . '.' . $extension;

          $path = public_path() . '/' . 'images' . '/' . $fileName;
          file_put_contents($path, $decoded);

          $base_url= App::make('url')->to('/');

          $finalpath= $base_url.'/'.'images'.'/'. $fileName;

          $mydata->images = $finalpath;
         
          
          }
          else{

               $mydata->images = $request->images;
         
          }
       //images



          $mydata->full_name = $request->full_name;
          $mydata->work_title = $request->work_title;
          $mydata->details = $request->details;


          //CV_File 

          if($request->cv_doc != "" && $request->cv_doc != $mydata->cv_doc)
          {
          $exploded2 = explode(',', $request->cv_doc);
          $decoded2 = base64_decode($exploded2[1]);

               if (str_contains($exploded2[0], 'pdf')) {
                    $extension2 = 'pdf';
               } else {
                    $extension2 = 'docx';
               }

          $today2 = date("_Ymd_His");

          $fileName2 = Str::random(8) . $today2 . '.' . $extension2;

          $path2 = public_path() . '/' . 'files' . '/' . $fileName2;
          file_put_contents($path2, $decoded2);

          $mydata->cv_doc = $fileName2;

          }
          else{
               $mydata->cv_doc = $request->cv_doc; 
          }

       //CV_File


          $mydata->save();
          return ['message' => 'success'];
          

      
       
    }
}
