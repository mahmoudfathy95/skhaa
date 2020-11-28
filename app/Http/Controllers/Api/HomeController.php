<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

use App\Http\Resources\CitiesResource as CitiesResource;
use App\Http\Resources\BranchesResource as BranchesResource;
use App\Http\Resources\CategoryResource as CategoryResource;
use App\Http\Resources\SubcategoryResource as SubcategoryResource;
use App\Http\Resources\NewProductsResource as NewProductsResource;
use App\Http\Resources\OffersSliderResource as OffersSliderResource;
use App\Http\Resources\OurOffersResource as OurOffersResource;


use App\Models\products;
use App\Models\offers;
use App\ouroffers;
use App\Models\cities;
use App\Models\categories;
use App\newproducts;
use App\offersslider;
use App\Models\sub_categories;

use App\Helpers\ApiResponseHelper;

class HomeController extends Controller
{
    use ApiResponseHelper;

    public $products = [];
    public $offers = [];
    public $cities = [];
    public $branches = [];
    public $categories = [];
    public $sub_categories = [];

    public $branch_id = '';

    public function __construct(Request $request)
    {
        $this->branch_id = $request->branch_id;

    }
    
    

    public function getLatestProducts(Request $request){

        //$products = products::latest()->where('branch_id',$branch_id)->paginate(1);
        $branch_id = $this->branch_id; //!important

        $products = products::latest()->where('branch_id',$branch_id)->take(2)->get();
        $this->products = $products;


        $arr = ['status' => 200, 'data' => $this->products];

        return response()->json($arr);

    }

    public function getLatestOffers(Request $request){

        //$offers = offers::latest()->where('branch_id',$branch_id)->paginate(1);
        $branch_id = 1; //!important

        $offers = offers::latest()->where('branch_id',$this->branch_id)->take(2)->get();

        $this->offers = $offers;


        $arr = ['status' => 200, 'data' => $this->offers];

        return response()->json($arr);

    }

    ////////////////////////////////////////////////////////////////////////////////////



    // Get Our Offers
    public function getOurOffers(Request $request){
        //$ouroffers = ouroffers::where('branch_id',$this->branch_id)->get();
        $ouroffers = ouroffers::all();
        $ouroffers = OurOffersResource::collection($ouroffers);
        $ouroffersArr = $ouroffers->toArray($ouroffers);
        //dd($ouroffersArr);
        $allArr = [];
        foreach($ouroffersArr as $items){
            foreach($items as $ouroffer){
                $allArr[] = $ouroffer;
            }
        }
        //dd($allArr);

        return $this->setCode(200)->setData($allArr)->send();

    }

    // Get Sub Categories Of Category
    public function getCategorySubcategories(Request $request){
        $category = categories::find($request->id);
        $subcategories = $category->subs;
        $subcategories = SubcategoryResource::collection($subcategories);

        return $this->setCode(200)->setData($subcategories)->send();

    }

    // Get Branches Of City
    public function getCityBranches(Request $request){
        $city = cities::find($request->id);
        $branches = $city->branches;
        $branches = BranchesResource::collection($branches);

        return $this->setCode(200)->setData($branches)->send();

    }

    // Get Cities With Branches
    public function getCititesWithBranches(Request $request){

        $cities = cities::all();
        $cities = CitiesResource::collection($cities);

        return $this->setCode(200)->setData($cities)->send();

    }

    // Get Recently Added Products
    public function getNewProducts(Request $request){

        //$products = newproducts::where('branch_id',$this->branch_id)->get();
        $products = newproducts::latest()->whereExists(function ($query) {
                    $query->select(\DB::raw(1))
                      ->from('product_quantities')
                      ->whereRaw("product_quantities.product_id = newproducts.product_id")
                      ->whereRaw("product_quantities.branch_id = $this->branch_id")
                      ->whereRaw("product_quantities.quantity != 0");
                    })
                    ->get();
        //dd($products);
        $products = NewProductsResource::collection($products);
        //return $products;
        //dd($products);

        return $this->setCode(200)->setData($products)->send();
    }

    // Get Offers Slider
    public function getOffersSlider(Request $request){

        //$offersslider = offersslider::where('branch_id',$this->branch_id)->get();
        $offersslider = offersslider::all();
        $offersslider = OffersSliderResource::collection($offersslider);

        return $this->setCode(200)->setData($offersslider)->send();
    }

    // Get Categories With Sub Categories
    public function getCategoriesWithSubcategories(Request $request){

        $categories = categories::all();
        $categories = CategoryResource::collection($categories);

        return $this->setCode(200)->setData($categories)->send();

    }
}
