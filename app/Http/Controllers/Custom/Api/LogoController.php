<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class LogoController extends Controller
{
    public function show($id)
     {

          return Logo::find($id);
     }


    public function update(Request $request, $id)
    {


          $mydata = Logo::find($id);

          //images 
          if ($request->logo_image != $mydata->logo_image) {

          $exploded = explode(',', $request->logo_image);
          $decoded = base64_decode($exploded[1]);

          if (str_contains($exploded[0], 'jpeg')) {
               $extension = 'jpg';
          } else {
               $extension = 'png';
          }

          $today = date("_Ymd_His");

          $fileName = Str::random(12) . $today . '.' . $extension;

          $path = public_path() . '/' . 'images/logo' . '/' . $fileName;
          file_put_contents($path, $decoded);

          $base_url= App::make('url')->to('/');

          $finalpath= $base_url.'/'.'images/logo'.'/'. $fileName;

          $mydata->logo_image = $finalpath;

          } 
          else 
          {

               $mydata->logo_image = $request->logo_image;
          }
       //images

          $mydata->save();
          return ['message' => 'success'];

      
       
    }
}
