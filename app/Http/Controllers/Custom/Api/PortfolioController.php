<?php

namespace App\Http\Controllers\Custom\Api;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PortfolioController extends Controller
{
    public function index()
    {
        return Portfolio::where('status','Published')->paginate(8);
        //return Portfolio::paginate(2);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);

        $mydata = new Portfolio();

        //images 
        $exploded = explode(',', $request->images);
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $today = date("_Ymd_His");

        $fileName = Str::random(8) . $today . '.' . $extension;

        $path = public_path() . '/' . 'images/portfolios' . '/' . $fileName;
        file_put_contents($path, $decoded);

        $base_url = App::make('url')->to('/');

        $finalpath = $base_url . '/' . 'images/portfolios' . '/' . $fileName;

        $mydata->images = $finalpath;
        //images
        //banner

        if ($request->banner != "") {
            $exploded2 = explode(',', $request->banner);
            $decoded2 = base64_decode($exploded2[1]);

            if (str_contains($exploded2[0], 'jpeg')) {
                $extension2 = 'jpg';
            } else {
                $extension2 = 'png';
            }

            $today2 = date("_Ymd_His");

            $fileName2 = Str::random(12) . $today2 . '.' . $extension2;

            $path2 = public_path() . '/' . 'images/portfolios' . '/' . $fileName2;
            file_put_contents($path2, $decoded2);

            $base_url2 = App::make('url')->to('/');

            $finalpath2 = $base_url2 . '/' . 'images/portfolios' . '/' . $fileName2;

            $mydata->banner = $finalpath2;
        } else {
            $mydata->banner = "";
        }
       //banner



        $mydata->category_name = $request->category_name;

        $cate_id = str_replace(' ', '', $request->category_name);
        $mydata->category_id = $cate_id;

        $mydata->title = $request->title;
        $mydata->desc = $request->desc;
        $mydata->url = $request->url;
        $mydata->status = $request->status;
        $mydata->save();
        return ['message' => 'success'];
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'category_name' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);

        $mydata = Portfolio::find($id);

        //images 
        if ($request->images != $mydata->images) {

        $exploded = explode(',', $request->images);
        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $today = date("_Ymd_His");

        $fileName = Str::random(8) . $today . '.' . $extension;

        $path = public_path() . '/' . 'images/portfolios' . '/' . $fileName;
        file_put_contents($path, $decoded);

        $base_url = App::make('url')->to('/');

        $finalpath = $base_url . '/' . 'images/portfolios' . '/' . $fileName;

        $mydata->images = $finalpath;

        } else {

            $mydata->images = $request->images;
        }
        //images
        //banner

        if ($request->banner != "" && $request->banner != $mydata->banner) 
        {
            $exploded2 = explode(',', $request->banner);
            $decoded2 = base64_decode($exploded2[1]);

            if (str_contains($exploded2[0], 'jpeg')) {
                $extension2 = 'jpg';
            } else {
                $extension2 = 'png';
            }

            $today2 = date("_Ymd_His");

            $fileName2 = Str::random(12) . $today2 . '.' . $extension2;

            $path2 = public_path() . '/' . 'images/portfolios' . '/' . $fileName2;
            file_put_contents($path2, $decoded2);

            $base_url2 = App::make('url')->to('/');

            $finalpath2 = $base_url2 . '/' . 'images/portfolios' . '/' . $fileName2;

            $mydata->banner = $finalpath2;
        }
         else 
        {
            $mydata->banner = $request->banner;
        }
        //banner



        $mydata->category_name = $request->category_name;

        $cate_id = str_replace(' ', '', $request->category_name);
        $mydata->category_id = $cate_id;

        $mydata->title = $request->title;
        $mydata->desc = $request->desc;
        $mydata->url = $request->url;
        $mydata->status = $request->status;
        $mydata->save();
        return ['message' => 'success'];
    }
    

    public function show($id)
    {

            $portfolio = Portfolio::find($id);
            return $portfolio;
                
     
        
        
    }

    public function destroy($id)
    {
        $dep = Portfolio::find($id);
        $dep->delete();
    }
}
