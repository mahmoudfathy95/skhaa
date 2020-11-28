<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\OffersResource as OffersResource;

use App\Models\offers;
use App\Models\branches;

use Illuminate\Support\Facades\App;


use App\Helpers\ApiResponseHelper;


class OffersController extends Controller
{
    use ApiResponseHelper;

    // Get Pagination Data Function
    public function getPaginationData($data){

        $pagination_arr = [];
        $data_json = $data->toJson();
        $data_json = json_decode($data_json,true);
        $pagination_arr['current_page'] = $data_json['current_page'];
        $pagination_arr['first_page_url'] = $data_json['first_page_url'];
        $pagination_arr['from'] = $data_json['from'];
        $pagination_arr['last_page'] = $data_json['last_page'];
        $pagination_arr['last_page_url'] = $data_json['last_page_url'];
        $pagination_arr['next_page_url'] = $data_json['next_page_url'];
        $pagination_arr['per_page'] = $data_json['per_page'];
        $pagination_arr['prev_page_url'] = $data_json['prev_page_url'];
        $pagination_arr['to'] = $data_json['to'];
        $pagination_arr['total'] = $data_json['total'];

        return $pagination_arr;
    }

    // Get All Offers With Pagination
    public function getAllOffers(Request $request){

        //$branch_id = $request->branch_id; //!important

        $offers = offers::latest()->paginate(10);
        //$offers->appends(['branch_id' => $branch_id])->links();

        $pagination_arr = $this->getPaginationData($offers);

        $offers = OffersResource::collection($offers);

        return $this->setCode(200)->setData($offers)->send();

    }

    public function getOfferProducts(Request $request){
        
        if($request->has('locale')){
            App::setLocale($request->locale);
        }

        $offer_id = $request->offer_id; //!important
        $offer = offers::find($offer_id);

        $arr = [];
        foreach ($offer->offer_prods as $product) {
            
            if($product->quantity != 0){
            
                if($product->discount)
                {
                  if($product->discountOption->type==1)
                  {
                      $discount = $product->discountOption->value;
                  }else
                  {
                    $discount = ($product->discountOption->value*$product->product_price)/100;
                  }
                }else
                {
                    $discount = 0;
                }
            
                $REVIEWS = $product->comments;
                $add_reviews=0;
                
                if(count($REVIEWS) != 0){
                    foreach($REVIEWS as $key)
                    {
                       $add_reviews = $add_reviews+$key->review;
                    }
                }
                
                $branch = branches::find($product->branch_id);
                $vat = $branch->vat;
                
                $arr[] = [
                    'id' => $product->id,
                    'name' => (App::isLocale('en')) ? "$product->product_name" : "$product->product_name_ar",
                    'description'=> (App::isLocale('en')) ? "$product->product_details" : "$product->product_details_ar",
                    'price' => "$product->product_price",
                    'quantity' => ($product->quantity) ? $product->quantity : "",
                    'number' => $product->product_number,//$this->product_number,
                    'unit' =>  (App::isLocale('en')) ? $product->measurementUnit->name : $product->measurementUnit->name_ar,
                    'discount'=> $discount,
                    'image'=> asset('uploads/'.$product->product_main_image),
                    'images'=>array_map(function($value) { return asset('uploads/'.$value); }, $product->product_images),
                ];
            }
        };

        return $this->setCode(200)->setData($arr)->send();

    }

    // Filter Offers By Single Or Multi With Pagination
    public function filterOffersBySingleOrMulti(Request $request){

        $branch_id = $request->branch_id; //!important
        $single_or_multi = $request->single_or_multi; //!important

        $offers = offers::latest()->where('branch_id',$branch_id)->where('single_or_multi',$single_or_multi)->paginate(10);
        $offers->appends(['branch_id' => $branch_id])->links();

        $pagination_arr = $this->getPaginationData($offers);

        $offers = OffersResource::collection($offers);

        return $this->setCode(200)->setData($offers)->send();

    }

}
