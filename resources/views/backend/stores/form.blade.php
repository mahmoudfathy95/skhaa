<?php

use App\Http\Controllers\Helpers\Html\Components;
use App\Http\Controllers\Helpers\Functions;

if (!isset($user))
    $user = new \MediaSci\CmsBackendAuth\Models\CmsBackendUser;
$supplier= \App\Models\Supplier::where('store_id',$user->id)->first();

if(!is_object($supplier)){
    $supplier=new \App\Models\Supplier();
if(Functions::getCurrent()['status']==true){
    $supplier->lat=Functions::getCurrent()['lat'];
    $supplier->lng=Functions::getCurrent()['lng'];
}
}
?>
    <form method="post"  id="form">
                <div class="form-body">
                    @csrf
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">الاسم</label>
                                <input type="text" name="name" placeholder="أدخل الأسم" class="form-control required" value="{{$user->name}}" required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">البريد الألكترونى</label>
                                <input type="email" name="email" placeholder="ادخل البريد"  value="{{$user->email}}" class="form-control required"  required="">

                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="lat" value="{{$supplier->lat}}"/>
                    <input type="hidden" name="lng" value="{{$supplier->lng}}"/>
                    <input type="hidden" name="zoom" value="{{$supplier->zoom}}"/>
                    
                    <div class="form-group">
                        <div class="row">

                            <div class="col-6">
                                <label class="control-label">الرقم السرى</label>
                                <input type="password" name="password" placeholder="أدخل الرقم السرى" class="form-control "  >
                            </div>
                            <div class="col-6">
                                <label class="control-label">المدينه</label>
                                <select name="city_id" class="form-control select2" required="">
                                    @foreach($areas as $area)
                                    <optgroup label="{{$area->name}}">
                                        @foreach($area->cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                    
                                </select>
                            </div>
                           
                        </div>
                    </div>
                       <div class="row">
                                <label>الموقع</label>

                                <?= Components::editGoogleMap1($supplier->lat, $supplier->lng, $supplier->zoom) ?>

                            </div>
                      
                    <div class="form-actions">
                        <div class="form-group">
                            <input type="submit" name="save" class="btn btn-outline btn-primary" value="Save" />
                        </div>
                    </div>
                </div>
            </form>