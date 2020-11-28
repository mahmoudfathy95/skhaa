<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\cities;
use App\Models\branches;

class CitiesController extends Controller
{
    public $cities = [];
    public $branches = [];

    public function getCititesWithBranches(Request $request){

        $cities = cities::all()->pluck('city_name','id')->toArray();
        $this->cities = $cities;

        $test = [];

        foreach ($cities as $city_id => $city_name) {
            //$city_id = $city->id;
            $new_test = [];
            $new_branches = [];
            $branches = branches::where('city_id',$city_id)->pluck('branch_name','id')->toArray();
            $this->branches[$city_id] = [$branches,$city_name];
            foreach ($branches as $branch_id => $branch_name) {
                $new_branches[] = ["branch_id" => $branch_id , "branch_name" => $branch_name];
            }
            $new_test["city_id"] = $city_id;
            $new_test["city_name"] = $city_name;
            $new_test["branches"] = $new_branches;
            $test[] = $new_test;
        }

        //$arr = ['status' => 200, 'data' => $this->branches];
        $arr = ['status' => 200, 'data' => $test];

        return response()->json($arr);
    }

}
