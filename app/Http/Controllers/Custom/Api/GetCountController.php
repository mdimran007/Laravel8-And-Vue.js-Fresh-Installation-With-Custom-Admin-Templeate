<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetCount;

class GetCountController extends Controller
{
    public function show($id)
    {

        return GetCount::find($id);
    }


    public function update(Request $request, $id)
    {


        $mydata = GetCount::find($id);

        $mydata->get_award = $request->get_award;
        $mydata->research_paper = $request->research_paper;
        $mydata->project_done = $request->project_done;
        $mydata->happy_clients = $request->happy_clients;


        $mydata->save();
        return ['message' => 'success'];
    }
}
