<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistrictName;
class DistrictNameController extends Controller
{
    public function index()
    {
        return DistrictName::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'district_name' => 'required|regex:/^[a-zA-Z]+$/|unique:district_names,district_name',
            'district_name_bangla' => 'required|unique:district_names,district_name_bangla'
        ]);

        $mydata = new DistrictName();
        $mydata->district_name = $request->district_name;
        $mydata->district_name_bangla = $request->district_name_bangla;
        $mydata->save();
        return ['message' => 'success'];
    }

    public function destroy($id)
    {
        $dep = DistrictName::find($id);
        $dep->delete();
    }

    public function show($id)
    {

        return DistrictName::find($id);

    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'district_name' => 'required|regex:/^[a-zA-Z]+$/',
            'district_name_bangla' => 'required'
        ]);

        $mydata = DistrictName::find($id);
        $mydata->district_name = $request->district_name;
        $mydata->district_name_bangla = $request->district_name_bangla;
        $mydata->save();
        return ['message' => 'success'];

        
    }




}
