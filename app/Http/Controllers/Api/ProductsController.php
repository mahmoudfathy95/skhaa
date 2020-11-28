<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ProductResource as ProductResource;

use App\Models\products;
use App\Comment;

use App\Helpers\ApiResponseHelper;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    use ApiResponseHelper;


    public $product_id = '';
    public $branch_id = '';
    public $keyword = '';

    public function __construct(Request $request)
    {
        $this->product_id = $request->product_id;
        $this->branch_id = $request->branch_id;
        $this->products = $request->products;

    }

    // Comment


    public function comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'name' => 'required|string|max:255',
            'comment' => 'required',
            'review' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $this->setCode(400)->setError($validator->errors()->first())->send();
        }

        $data = $request->only('product_id', 'name', 'comment', 'review');
        Comment::create($data);
        return $this->setCode(200)->setSuccess('success')->send();
    }

    // End Comment


    // Get Pagination Data Function
    public function getPaginationData($data){

        $pagination_arr = [];
        $products_json = $data->toJson();
        $products_json = json_decode($products_json,true);
        $pagination_arr['current_page'] = $products_json['current_page'];
        $pagination_arr['first_page_url'] = $products_json['first_page_url'];
        $pagination_arr['from'] = $products_json['from'];
        $pagination_arr['last_page'] = $products_json['last_page'];
        $pagination_arr['last_page_url'] = $products_json['last_page_url'];
        $pagination_arr['next_page_url'] = $products_json['next_page_url'];
        $pagination_arr['per_page'] = $products_json['per_page'];
        $pagination_arr['prev_page_url'] = $products_json['prev_page_url'];
        $pagination_arr['to'] = $products_json['to'];
        $pagination_arr['total'] = $products_json['total'];

        return $pagination_arr;
    }

    // Get All Products With Pagination
    public function getAllProducts(Request $request){

        $branch_id = $this->branch_id; //!important
        //dd($branch_id);
        $products = products::latest()->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('product_quantities')
                      ->whereRaw("product_quantities.product_id = products.id")
                      ->whereRaw("product_quantities.branch_id = $this->branch_id")
                      ->whereRaw("product_quantities.quantity != 0");
            })
            ->paginate(10);
        //dd($products);
        $products->appends(['branch_id' => $branch_id])->links();

        $pagination_arr = $this->getPaginationData($products);

        $products = ProductResource::collection($products);
        //dd($pagination_arr);

        return $this->setCode(200)->setData($products)->send();

    }


////////////////////////////////// Start Of Filter ///////////////////////////////////////

    // Filter Products Function
    public function filter(Request $request){

        $branch_id = $request->branch_id; //!important
        //$products = products::latest()->where('branch_id',$branch_id);
        $products = products::whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('product_quantities')
                      ->whereRaw("product_quantities.product_id = products.id")
                      ->whereRaw("product_quantities.branch_id = $this->branch_id")
                      ->whereRaw("product_quantities.quantity != 0");
            });
            
        if ($request->has('category_id')) {
            if($request->category_id != ""){
                $category_id = $request->category_id; //!important
                $products = $products->where('category_id',$category_id);
            }
        }
        if ($request->has('subcategory_id')) {
            if($request->subcategory_id != ""){
                $subcategory_id = $request->subcategory_id; //!important
                $products = $products->where('subcategory_id',$subcategory_id);
            }
        }
        if ($request->has('min') && $request->has('max')) {
            $min = $request->min; //!important
            $max = $request->max; //!important
            $products = $products->whereBetween("product_price",[$min,$max]);
        }else if ($request->has('min') || $request->has('max')) {
            if ($request->has('min')){
                $min = $request->min; //!important
                $products = $products->where("product_price",">=",$min);
            }
            else if ($request->has('max')){
                $max = $request->max; //!important
                $products = $products->where("product_price","<=",$max);
            }

        }

        if ($request->has('price_order')) {
            if($request->price_order == 'lowest' || $request->price_order == 'الاقل'){
                $products = $products->orderBy('product_price','ASC');
                
            }else if($request->price_order == 'highest' || $request->price_order == 'الاعلي'){
                $products = $products->orderBy('product_price','DESC');
                //dd($products->get());
            }
        }
        if($request->has('mostviewed') && $request->mostviewed == 'true'){
            $products = $products->orderBy('views','DESC');
        }
        if($request->has('rescently_added') && $request->rescently_added == 'true'){
            $products = $products->orderBy('id','DESC');
        }

        $products = $products->paginate(10);
        $products = ProductResource::collection($products);


        return $this->setCode(200)->setData($products)->send();

    }

    /*
        // Get Products By Category With Pagination
        public function getProductsFilterCategory(Request $request){

            $category_id = $request->category_id; //!important
            $branch_id = $request->branch_id; //!important

            $products = products::latest()->where('category_id',$category_id)->where('branch_id',$branch_id)->paginate(1);
            $products->appends(['branch_id' => $branch_id,'category_id' => $category_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Products By Sub Category With Pagination
        public function getProductsFilterSubCategory(Request $request){

            $subcategory_id = $request->subcategory_id; //!important
            $branch_id = $request->branch_id; //!important

            $products = products::latest()->where('subcategory_id',$subcategory_id)->where('branch_id',$branch_id)->paginate(1);
            $products->appends(['branch_id' => $branch_id, 'subcategory_id' => $subcategory_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Products By Min And Max Price With Pagination
        public function getProductsFilterMinAndMax(Request $request){

            $branch_id = $request->branch_id; //!important
            $min = $request->min; //!important
            $max = $request->max; //!important

            $products = products::latest()->where('branch_id',$branch_id)
            ->whereBetween("product_price",[$min,$max])
            ->paginate(1);
            $products->appends(['branch_id' => $branch_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Products By Lowest Price Pagination
        public function getProductsFilterLowestPrice(Request $request){

            $branch_id = $request->branch_id; //!important

            $products = products::where('branch_id',$branch_id)->orderBy('product_price','ASC')->paginate(6);
            $products->appends(['branch_id' => $branch_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Products By Highest Price Pagination
        public function getProductsFilterHighestPrice(Request $request){

            $branch_id = $request->branch_id; //!important

            $products = products::where('branch_id',$branch_id)->orderBy('product_price','DESC')->paginate(6);
            $products->appends(['branch_id' => $branch_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Most Viewed Products
        public function getMostViewedProducts(Request $request)
        {

            $branch_id = $request->branch_id; //!important

            $products = products::where('branch_id',$branch_id)->orderBy('views','DESC')->paginate(6);
            $products->appends(['branch_id' => $branch_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }

        // Get Recently Added Products
        public function getRecentlyAddedProducts(Request $request)
        {
            $branch_id = $request->branch_id; //!important

            $products = products::where('branch_id',$branch_id)->orderBy('id','DESC')->paginate(6);
            $products->appends(['branch_id' => $branch_id])->links();

            $pagination_arr = $this->getPaginationData($products);

            $products = ProductResource::collection($products);

            return $this->setCode(200)->setData(['products'=>$products,'pagination'=>$pagination_arr])->send();

        }
    */

////////////////////////////////// End Of Filter ///////////////////////////////////////


//////////////////////////////// Search Products //////////////////////////////////////


// Get Product Details
public function searchProducts(Request $request){

    //$token = $request->bearerToken();
    //dd($token);
    //App::setLocale('ar');
    $locale =  App::getLocale();
    //dd($locale);
    //dd(__('users.firstname'));

    $keyword = $request->keyword;
    $branch_id = $request->branch_id;
    
    $this->keyword = $keyword;

    //$products = products::where('branch_id',$branch_id);
   $products = products::whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('product_quantities')
                      ->whereRaw("product_quantities.product_id = products.id")
                      ->whereRaw("product_quantities.branch_id = $this->branch_id")
                      ->whereRaw("product_quantities.quantity != 0");
                })
                ->where(function ($query) {
                    $query->where('product_name', 'like', '%' . $this->keyword . '%')
                            ->orWhere('product_name_ar', 'like', '%' . $this->keyword . '%')
                            ->orWhere('product_details', 'like', '%' . $this->keyword . '%')
                            ->orWhere('product_details_ar', 'like', '%' . $this->keyword . '%');
                })
                ->paginate(10);
            


    $products = ProductResource::collection($products);

    return $this->setCode(200)->setData($products)->send();


}


////////////////////////////// End Search Products ////////////////////////////////////



    // Get Product Details
    public function getProductDetails(Request $request){

        $product = products::where('id',$request->product_id)->get();
        $productupdate = products::find($request->product_id);
        $data = $product[0]->toArray();
        $data['views'] = $data['views'] + 1;
        //dd($data);
        $productupdate->update($data);
        $product = ProductResource::collection($product);

        return $this->setCode(200)->setData($product[0])->send();

    }

    // Get Related Product
    public function getRelatedProducts(Request $request){

        $product = products::find($request->product_id);
        $related_products = products::where('branch_id',$product->branch_id)->where('subcategory_id',$product->subcategory_id)->get();
        $related_products = ProductResource::collection($related_products);

        return $this->setCode(200)->setData($related_products)->send();

    }



}
