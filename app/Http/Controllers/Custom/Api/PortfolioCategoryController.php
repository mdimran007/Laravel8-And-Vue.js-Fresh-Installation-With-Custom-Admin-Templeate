<?php

namespace App\Http\Controllers\Custom\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        return PortfolioCategory::where('status', 'Published')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:portfolio_categories,category_name',
            'status' => 'required',
        ]);

        $mydata = new PortfolioCategory();

        $mydata->category_name = $request->category_name;

        $cate_id = str_replace(' ', '', $request->category_name);
        $mydata->category_id = $cate_id;

        $mydata->status = $request->status;
        $mydata->save();
        return ['message' => 'success'];
    }

    public function update(Request $request, $id)
    {

        

        $this->validate($request, [
            'category_name' => 'required',
            'status' => 'required',
        ]);

        $mydata = PortfolioCategory::find($id);

        $mydata->category_name = $request->category_name;

        $cate_id = str_replace(' ', '', $request->category_name);
        $mydata->category_id = $cate_id;

        $mydata->status = $request->status;
        $mydata->save();
        return ['message' => 'success'];

    
    }

    public function show($id)
    {

        return PortfolioCategory::find($id);
    }

    public function destroy($id)
    {
        $dep = PortfolioCategory::find($id);
        $dep->delete();
    }
}
