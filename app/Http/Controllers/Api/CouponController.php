<?php

namespace App\Http\Controllers\Api;

use App\Models\coupon;
use App\Http\Resources\CouponResource;

use App\Helpers\ApiResponseHelper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    use ApiResponseHelper;
    
    public function getData($code){
        
        $dt = date('Y-m-d');
        
        $coupon = coupon::where('code',$code)->where('date_from','<=',$dt)->where('date_to','>=',$dt)->get();
        if(count($coupon) != 0){
            $coupon = CouponResource::collection($coupon);
            return $this->setCode(200)->setSuccess('success')->setData($coupon[0])->send();
        }else{
            return $this->setCode(400)->setError('هذا الكود غير صالح')->send();
        }
        
        
        

        //return $this->setCode(200)->setData($coupon)->send();
    }
}
