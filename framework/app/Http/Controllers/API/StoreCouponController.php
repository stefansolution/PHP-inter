<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Coupon as Coupon;
use App\Modules\Admin\Models\Store as Store;
use App\Modules\Admin\Models\Category as Category;
use App\Modules\Admin\Models\Storecategory as Storecategory;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreCouponController extends Controller
{

    public function getAllStores(){
        
        $stores = Store::select('store_name','slug','domain')->where('status','=',1)->get();
        $response = array('status'=> 200, 'stores'=> $stores);
        return response()->json($response);
    }
    
    public function addCoupons(Request $request){
        $coupons_details = $request->all();
        $insert_data=[];
        $errors = [];
        $coupons_added = 0;
        $coupons_already_exist = 0;
       foreach($coupons_details as $key=>$coupon){
           
            $offer_amount= 0;
            $discount_type = "$";
            $expiry_date = '';
            
            if( isset($coupon['store_name']) && isset($coupon['title']) && isset($coupon['slug_name']) && isset($coupon['category']) && isset($coupon['url']) && isset($coupon['expiry_date'])){
            
                $description=$coupon['title'];
                $store_slug = $coupon['slug_name'];
                $category_name =$coupon['category'];
                $Category = Category::select('id')->where('category_name','=',$category_name)->first();
                $Store = Store::select('id')->where('slug','=',$store_slug)->first();
                
                $url = $coupon['url'];
                $url = str_replace("?reveal=true","",$url);
                $urlArray = explode('/',$url);
                $deal_id = end($urlArray);
                
                $coupon_id= $Store->id.'XL'.Str::random(9).'DR'.$Store->id;
                
                if($coupon['expiry_date']=="never expires"){
                    $expiry_date = NULL;
                }else{
                    $expiry_date = Carbon::parse($coupon['expiry_date']);
                    $expiry_date = $expiry_date->format('Y-m-d');
                }
            
                $offer_str = explode("%",$description); 
                if(count($offer_str) > 1){
                  $offer_amount_arr = explode(" ",$offer_str[0]);  
                  $offer_amount = end($offer_amount_arr);
                  $discount_type = '%';
                }else{
                    $offer_str = explode("$",$description);
                    if(count($offer_str) > 1){
                      $offer_amount_arr = explode(" ",$offer_str[1]);  
                      $offer_amount = $offer_amount_arr[0];
                      $discount_type = '$';
                    }
                }
            
                $already = Coupon::where('deal_id','=',$deal_id)->first();
                if(!$already){
                    if($Store->id !='' && $Category->id!=''){
                        $Storecategory = new Storecategory;
                        $Storecategory->store_id=$Store->id;
                        $Storecategory->cat_id=$Category->id;
                        $Storecategory->Save();
                    }
                    $data = [
                        'store_id'                  => $Store->id,
                        'description'               => $description, 
                        'coupon_off'               => $offer_amount,
                        'discount_type'             => $discount_type,
                        'code'                      =>$coupon['coupon_code'],
                        'coupon_used'               => rand(10,100),
                        'deal_id'                   => $deal_id, 
                        'coupon_id'               => $coupon_id,
                        'expiry_date'             => $expiry_date,
                        'status'                 =>1,
                        'avg_saving'            =>0,
                    ];
                    $insert_data[] = $data;
                    $coupons_added++;
                } else {
                    $coupons_already_exist++;
                }
            } else {
                $errors[] = array('coupon_index'=>$key);
            }
       }
        if(COUNT($insert_data) > 0){
            $insert_data = collect($insert_data);
            $chunks = $insert_data->chunk(100);
            foreach ($chunks as $chunk)
            {
               \DB::table('coupons')->insert($chunk->toArray());
            }
        }
        $response = array('status'=> 200, 'message'=>'Coupons added successfully', 'total_coupons_count' => COUNT($coupons_details) ,'newly_added_coupons_count' => $coupons_added, 'already_exist_coupons_count' => $coupons_already_exist, 'invalid_coupons_count' => COUNT($errors), 'invalid_coupons_index'=>$errors);
        return response()->json($response);
    }
    
    
    
    //end of controller
}
