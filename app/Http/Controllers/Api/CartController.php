<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\products;
use App\Models\branches;
use App\Http\Resources\CartResource;

use App\Helpers\ApiResponseHelper;


use App\Http\Controllers\Controller;

class CartController extends Controller
{
    use ApiResponseHelper;
    public function checkCart(Request $request)
    {
        $cart=[];
        //$vat = Config::where('key','vat')->first()->value;
        $branch = branches::find($request->branch_id);
        $vat = $branch->vat;
        $divided_vat = (1 . "." . $vat);
        $test = 5*$divided_vat;
        $total_vat=0;
        $total = 0;
        $free_shipping = $branch->free_shipping;
        foreach($request->data as $key)
        {
           $product = products::find($key['product_id']);
           //dd($product);

           if(!empty($product))
           {
            if($product->discount)
            {
                //dd($product);
                if($product->discountOption->type == 1)
                {
                    //dd($product->discountOption->value);
                    $discount = $product->discountOption->value;
                    //$total_vat += $product->product_price * $vat * $key['quantity'] / 100;
                    $total += ($product->product_price- $discount) * $key['quantity'];
                }else
                {
                   $discount = ($product->discountOption->value * $product->price)/100;
                   //$total_vat += $product->product_price * $vat * $key['quantity'] / 100;
                   $total += ($product->product_price- $discount) * $key['quantity'];
                }

            }else
            {
              //$total_vat += $product->product_price * $vat * $key['quantity'] / 100;
              $total += $product->product_price * $key['quantity'];
            }
            
            $total_vat = $total - ($total/$divided_vat);
            $total_vat = number_format((float)$total_vat, 2, '.', '');

            if($product->quantity>=$key['quantity'])
            {
                $product['avaliable']='avliable';
            }else
            {
                $product['avaliable']='non avliable';
            }
              $product['sendquantity']=$key['quantity'];
              array_push($cart,CartResource::make($product));
           }
        }

        //dd($cart);

        $data=['cart'=>$cart, 'total'=>$total, 'total_vat'=>$total_vat, 'free_shipping'=>$free_shipping];
        //$data=['cart'=>$cart, 'total'=>$total];

        return $this->setCode(200)->setData($data)->send();
    }
}
