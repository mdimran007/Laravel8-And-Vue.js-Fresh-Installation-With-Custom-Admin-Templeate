<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index()
    {
        return Services::where('status', 'Published')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service_icon' => 'required',
            'service_title' => 'required|unique:services,service_title',
            'service_description' => 'required'
        ]);

        $mydata = new Services();
        $mydata->service_icon = $request->service_icon;
        $mydata->service_title = $request->service_title;
        $mydata->service_description = $request->service_description;
        $mydata->save();
        return ['message' => 'success'];
    }


    public function show($id)
    {

        return Services::find($id);
    }

    public function destroy($id)
    {
        $dep = Services::find($id);
        $dep->delete();
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'service_icon' => 'required',
            'service_title' => 'required',
            'service_description' => 'required'
        ]);


        $mydata = Services::find($id);

        $mydata->service_icon = $request->service_icon;
        $mydata->service_title = $request->service_title;
        $mydata->service_description = $request->service_description;
        $mydata->status = $request->status;
        $mydata->save();
        return ['message' => 'success'];

    }


}
