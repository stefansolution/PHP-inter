<?php

namespace App\Http\Controllers;
use App\Modules\Admin\Models\Category as Category;
use App\Modules\Admin\Models\Store as Store;
use App\Modules\Admin\Models\Coupon as Coupon;
use App\Modules\Admin\Models\Storecategory as Storecategory;
use App\Newsletter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Mail\subscription;
use App\Mail\couponNewsletter;
use Mail;
use View;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }

*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
     
     
    public function index(){
        $active=[];
        $data['nav_categories']=$this->navCategories();
        $data['categories']=Category::where('status','=',1)->get();
        $data['fav_stores']=DB::select("SELECT s.* FROM (SELECT c.store_id, SUM(coupon_used) as total_used FROM coupons c where c.status = 1 GROUP BY store_id ORDER BY total_used DESC LIMIT 0,6)as c INNER JOIN stores as s ON s.id = c. store_id WHERE s.status = 1");
        $data['topstores']=DB::select("SELECT s.* FROM (SELECT c.store_id, SUM(coupon_used) as total_used FROM coupons c where c.status = 1 GROUP BY store_id ORDER BY total_used ASC LIMIT 0,8)as c INNER JOIN stores as s ON s.id = c. store_id  WHERE s.status = 1");
        
        $data['coupons']=DB::select("SELECT c.*, SUM(coupon_used) as total_used FROM coupons c WHERE c.status = 1 GROUP BY store_id ORDER BY total_used DESC LIMIT 0,6");
        $data['assets_front']=url('/framework/public/');
        $data['base_url']=url('/');
        $data['title']="DealRated.com - Coupons, Discounts and Coupon Codes";
        $data['meta_title']='';
        $data['meta_description']='';
        $data['description']='Get the latest coupons and discount codes on different brands from DealRated. Don’t waste time on expired promo codes, and let us help save you money.';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['schemaQues']='';

        if(count($data['coupons'])>0){
             foreach($data['coupons'] as $coupon){
                $coupon = (array) $coupon;
                $store=Store::where('id','=',$coupon['store_id'])->first();
                $coupon['Storedetails'] = $store;
                $coupon['discovered']= $this->discoveredMonth($coupon);
                $coupon['lastused']=$this->lastUsedMonth($data['coupons']);
                $active[] = $coupon;
            }  
            $data['coupons']=$active; 
        }
        $data['topcategories'] = $this->topCategories();
        return view('index',$data);
    }
    
    public function store($slug, Request $request){
       
        $active=[];
        $expired=[];
        $catids=[];
        $storeIds=[];
        $data['schemaQues']='';
        $schemaQues=[];
        $schemaQues[0]=array(
            "@type"=>"Question",
            "name"=>"When does #storeName# release new coupon codes?",
            "acceptedAnswer"=>array(
            "@type"=> "Answer",
            "text"=>"Recently, we have been able to find a new discount code from #storeName# #every# ")
        );
        $schemaQues[1]=array(
            "@type"=>"Question",
            "name"=>"How do I use promo codes for #storeName#?",
            "acceptedAnswer"=>array(
            "@type"=> "Answer",
            "text"=>"When you are viewing your cart and about to checkout on #storeDomain#, be sure to look out for a field that asks you to enter a code for a discount")
        );
        $data['meta_title']='';
        $data['meta_description']='';
        $data['meta_image']='';
        $data['title']='';
        $data['meta_url']='';
        $data['avg_saving']='';
        $data['couponoff']='';
        $data['description']='';
        $data['store_categories']='';
        $data['nav_categories']=$this->navCategories();
        $data['storedetail']=Store::where('slug','=',$slug)->where('image','not like', "%wethrift%")->first();
        $data['base_url']=url('/store/'.$slug);
        $data['assets_front']=url('/framework/public/');
        $coupon_Avg=[];
        $data['avg_type']='';
        $avg_saving=[];
        if($data['storedetail']){
            $id=$data['storedetail']->id;
            $slug=$data['storedetail']->slug;
            $data['topcategories'] = $this->topCategories();

            $store_categories =  DB::table('store_categories')
            ->leftJoin('categories', 'store_categories.cat_id', '=', 'categories.id')
            ->where('store_categories.store_id','=',$id)
            ->get();
            $store_categories = (array) $store_categories->toArray();
            $data['store_categories']=$store_categories;
            
            $data['coupons']=Coupon::where('store_id','=',$data['storedetail']->id)->where('status','=',1)->orderBy('coupon_off','DESC')->get();
            $data['couponCount']=count($data['coupons']);
            $data['lastupdated'] = Coupon::select('updated_at')->where('store_id','=',$data['storedetail']->id)->orderBy('updated_at','DESC')->limit(1)->first();

            if(count($data['coupons'])>0){
                $firstcoupondate=Coupon::select('created_at')->where('store_id','=',$data['storedetail']->id)->where('status','=',1)->orderBy('created_at','ASC')->limit(1)->first();
                $lastcoupondate=Coupon::select('created_at')->where('store_id','=',$data['storedetail']->id)->where('status','=',1)->orderBy('created_at','DESC')->limit(1)->first();
              
                $diff = date_diff($firstcoupondate->created_at,$lastcoupondate->created_at);
                $total =$diff->format("%R%a");
                $days =str_replace("+","",$total);
    
                $data['lastday']=$days;
                
                $everyday=floor($days / count($data['coupons']));
                $data['everyday']=$everyday;
               
                $coupon_off=[];
                foreach($data['coupons'] as $coupon){
                    $coupon = (array) $coupon->toArray();
                    $store=Store::where('id','=',$coupon['store_id'])->first();
                    $coupon['Storedetails'] = $store;
                    $coupon['discovered']= $this->discoveredMonth($coupon);
                    $coupon['lastused']=$this->lastUsedMonth($data['coupons']);
                    $active[] = $coupon;
                    $coupon_off[]=$coupon['coupon_off'];
                }
                
                $data['coupons']=$active; 
                $get= $this->getMax($coupon_off);
                if($get){
                  $best_coupon = Coupon::select('description')->where('store_id','=',$data['storedetail']->id)->where('status','=',1)->where('coupon_off','=',$get)->first();
                  $count_coupon=Coupon::where('store_id','=',$id)->where('status','=',1)->count();
                  $avg_count=Coupon::where('store_id','=',$id)->where('discount_type','=','%')->where('status','=',1)->count();
                
                  if($avg_count>0){
                	  $coupon_Avg=Coupon::where('store_id','=',$id)->where('discount_type','=','%')->where('status','=',1)->get();
                	  $data['avg_type'] = '%';
                	  
                  }else if($avg_count == 0){
                	  $coupon_Avg=Coupon::where('store_id','=',$id)->where('discount_type','=','$')->where('status','=',1)->get();
                	  $data['avg_type'] = '$';
                	  
                  }
                  
                  if(count($coupon_Avg)>0){
                   foreach($coupon_Avg as $avg){
                	     $avg_saving[] = $avg->coupon_off;
                	  }
                	  $total = array_sum($avg_saving);
                	  $data['avg_saving']=bcdiv($total, $count_coupon);
                  }
                    $data['couponoff']=$best_coupon->description;
                    
                }
                
                $coupon_off= $data['coupons'][0]['coupon_off'];
                $description=$data['coupons'][0]['description'];
                $discountType="%";
                if(strpos($description,"%")  === false) {
                    $discountType="$";
                }
                
                foreach($schemaQues as $key=> $schema){
                    
                    $schemaQues[$key]["name"]=str_replace('#storeName#',$data['storedetail']->store_name,$schema["name"]);
                   
                   $schemaQues[$key]["acceptedAnswer"]['text']=str_replace('#storeName#',$data['storedetail']->store_name,$schemaQues[$key]["acceptedAnswer"]['text']);
                   
                   $schemaQues[$key]["acceptedAnswer"]['text']=str_replace('#storeDomain#',$data['storedetail']->domain,$schemaQues[$key]["acceptedAnswer"]['text']);
                     
                     if($everyday>0){
                          $schemaQues[$key]["acceptedAnswer"]['text']=str_replace('#every#',$everyday." days",$schemaQues[$key]["acceptedAnswer"]['text']);
                     
                     }else if($everyday==1){
                        $schemaQues[$key]["acceptedAnswer"]['text']=str_replace('#every#',"Today",$schemaQues[$key]["acceptedAnswer"]['text']);
                         
                     }else{
                         $schemaQues[$key]["acceptedAnswer"]['text']=str_replace('#every#',"Every day",$schemaQues[$key]["acceptedAnswer"]['text']);
                     }
                }
                 $data['schemaQues']=json_encode($schemaQues);
                $current_date=date("M Y");
                if($discountType == "$"){
                    $data['meta_title']=$discountType . $coupon_off.' off at '.$data['storedetail']->store_name.' ('.$data['couponCount'].' Coupon Codes) '.$current_date.' Discounts and Promos';
                    $data['description']='Get '.$data['storedetail']->domain.' coupon codes, discounts and promo codes including '. $discountType .$coupon_off .' off. Find the top rated discounts and save!';
                    $data['meta_description']='Get '.$data['storedetail']->domain.' coupon codes, discounts and promo codes including '. $discountType .$coupon_off .' off. Find the top rated discounts and save!';
                    $data['title']=$discountType . $coupon_off .' off at '.$data['storedetail']->store_name.' ('.$data['couponCount'].' Coupon Codes) '.$current_date.' Discounts and Promos';  
                } else {
                    $data['meta_title']=$coupon_off. $discountType .' off at '.$data['storedetail']->store_name.' ('.$data['couponCount'].' Coupon Codes) '.$current_date.' Discounts and Promos';
                    $data['description']='Get '.$data['storedetail']->domain.' coupon codes, discounts and promo codes including '.$coupon_off. $discountType .' off. Find the top rated discounts and save!';
                    $data['meta_description']='Get '.$data['storedetail']->domain.' coupon codes, discounts and promo codes including '.$coupon_off. $discountType .' off. Find the top rated discounts and save!';
                    $data['title']=$coupon_off. $discountType .' off at '.$data['storedetail']->store_name.' ('.$data['couponCount'].' Coupon Codes) '.$current_date.' Discounts and Promos';  
                }
                $data['meta_image']=url('/framework/public/assets/store_images/'.$data['storedetail']->image);
                $data['meta_url']=url('/store/'.$slug);
            }
            
            $expired=Coupon::where('store_id','=',$data['storedetail']->id)->where('status','=',0)->get();   
            $data['countexpired']=count($expired);
            $data['storecategories']=DB::table('categories')->whereIn('id', $catids)->get();
            $data['today'] = new \DateTime();
           
            return view('store',$data);
        }else{
            $data['title']='DealRated.com - Coupons, Discounts and Coupon Codes';
            $data['topcategories'] = $this->topCategories();
            return view('invalid',$data);
        }
        
    }

    public function category($slug, Request $request){
        $active=[];
        $data['schemaQues']='';
        $data['coupons']='';
        $data['nav_categories']=$this->navCategories();
        $data['categoryDetails']=Category::where('slug','=',$slug)->first();
        $data['base_url']='';
        if($data['categoryDetails']){
            $cat_id=$data['categoryDetails']->id;
            $data['coupons']= DB::select("SELECT * FROM `coupons` WHERE store_id IN (SELECT store_id FROM `store_categories` WHERE cat_id = $cat_id) AND status = 1 GROUP BY store_id ORDER BY coupon_off DESC");
            if(count($data['coupons'])>0){ 
                foreach($data['coupons'] as $coupon){
                    $coupon= (array) $coupon;
                    $store=Store::where('id','=',$coupon['store_id'])->first();
                    $coupon['Storedetails'] = $store;
                    $coupon['discovered']= $this->discoveredMonth($coupon);
                    $coupon['lastused']=$this->lastUsedMonth($data['coupons']);
                    $active[] = $coupon;
                }  
                $data['coupons']=$active;
            } 
            $data['assets_front']=url('/framework/public/');
            $data['topcategories'] = $this->topCategories();
            $data['meta_title']='';
            $data['description']='Find the best '.$data['categoryDetails']->category_name.' coupons, discounts and promo codes from the stores you love.';
            $data['meta_description']='';
            $data['title']='Find the best '.$data['categoryDetails']->category_name.' coupons, discounts and promo codes from the stores you love.';
            $data['meta_image']='';
            $data['meta_url']='';
            return view('category',$data);
        }else{
            $data['assets_front']=url('/framework/public/');
            $data['topcategories'] = $this->topCategories();
            $data['name']='category';
            $data['meta_title']='';
            $data['description']='';
            $data['title']='DealRated.com - Coupons, Discounts and Coupon Codes';
            $data['meta_description']='';
            $data['meta_image']='';
            $data['meta_url']='';
            return view('invalid',$data);
        }
    }

    public function about(){
        $data['meta_title']='';
        $data['meta_description']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['description']='';
        $data['base_url']='';
        $data['schemaQues']='';
        $data['title']='About DealRated - We help shoppers save money online';
        $data['nav_categories']=$this->navCategories();
        $data['assets_front']=url('/framework/public/');
        $data['topcategories'] = $this->topCategories();
        
        return view('about',$data);
    }
    
    
    public function privacy(){
        $data['meta_title']='';
        $data['schemaQues']='';
        $data['meta_description']='';
        $data['description']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['title']='Privacy policy - Dealrated.com';
        $data['nav_categories']=$this->navCategories();
        $data['assets_front']=url('/framework/public/');
        $data['topcategories'] = $this->topCategories();
        $data['base_url']=url('/privacy');
        return view('privacypolicy',$data);
    }
    
    public function terms(){
        $data['meta_title']='';
        $data['schemaQues']='';
        $data['meta_description']='';
        $data['description']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['title']='Terms and conditions - Dealrated.com';
        $data['nav_categories']=$this->navCategories();
        $data['assets_front']=url('/framework/public/');
        $data['topcategories'] = $this->topCategories();
        $data['base_url']=url('/terms');
        return view('termCondition',$data);
    }

    public function updateCouponLastUsed($id, Request $request){
        $coupon=Coupon::find($id);
        
        $coupon_used=$coupon->coupon_used +1;
        $coupon->coupon_used=$coupon_used;
        $coupon->update();
        /*$coupon->touch();*/
        $response = array('status'=>'200', 'message'=>'coupou last use update successfully.','coupondetails'=>$coupon);
            return response()->json($response);

    }

    public function searchCouponDeal(Request $request){
        $active=[];
        $title=$request['q'];
        
        $data['nav_categories']=$this->navCategories();
        $data['coupons'] = DB::table('coupons as c')->select('c.*')->join('stores as s', 'c.store_id', '=', 's.id')->where('c.status','=',1)->where('s.store_name', 'like', '%' . $title . '%')->orwhere('c.description','like','%' .$title.'%')->orderBy('id', 'DESC')
            ->get();
        $data['schemaQues']='';
        $data['meta_title']='';
        $data['title']='';
        $data['meta_description']='';
        $data['description']='';
        $coupon_off='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['base_url']='';
        if(count($data['coupons'])>0){
            $coupon_off= $data['coupons'][0]->coupon_off;
            foreach($data['coupons'] as $coupon){
                $coupon= (array) $coupon;
                $store=Store::where('id','=',$coupon['store_id'])->first();
                $coupon['Storedetails'] = $store;
                $coupon['discovered']= $this->discoveredMonth($coupon);
                $coupon['lastused']=$this->lastUsedMonth($data['coupons']);
                $active[] = $coupon;
            }
           
            $current_date=date("M Y");
            $count=count($data['coupons']);
            $data['coupons']=$active;
            $data['description']='Get '.$coupon['Storedetails']->domain.' coupon codes, discounts and promo codes including '.$coupon_off.'% off. Find the top rated discounts and save!';
            $data['meta_description']='Get '.$coupon['Storedetails']->domain.' coupon codes, discounts and promo codes including '.$coupon_off.'% off. Find the top rated discounts and save!';
            $data['meta_title']=$coupon_off.'% off at '.$coupon['Storedetails']->store_name.' ('.$count.' Coupon Codes) '.$current_date.' Discounts and Promos';
            $data['title']=$coupon_off.'% off at '.$coupon['Storedetails']->store_name.' ('.$count.' Coupon Codes) '.$current_date.' Discounts and Promos';
            $data['meta_image']=url('/framework/public/assets/store_images/'.$coupon['Storedetails']->image);
            $data['meta_url']=url('/store/'.$coupon['Storedetails']->slug);
            $data['base_url']=url('/store/'.$coupon['Storedetails']->slug);
        }
        $data['categories']=Category::all();
        $data['countcoupon']=count($data['coupons']);
        $data['assets_front']=url('/framework/public/');
        
        $data['topcategories'] = $this->topCategories();
        
        return view('search',$data);
    }
    
    public function searchStore(Request $request){
        $storeName=$request['storename'];
        $stores=Store::select('store_name')->where('status','=',1)->where('store_name', 'like', $storeName . '%')->get();
        $response = array('status'=> 200, 'message'=>"successfully.",'stores'=>$stores);
        return response()->json($response);
    }

    public function subscribe(Request $request){
        $storeId =$request['storeId'];
        $email=  $request['email'];
        $storeName= $request['store'];
        $already=Newsletter::where('store_id','=',$storeId)->where('mail','=',$email)->get()->count();
        if($already){
            $response = array('status'=> 200, 'message'=>"Thankyou, We will update you as soon as we discover coupons for this store.");
            return response()->json($response);
        }else{
            $newsletter= new Newsletter;
            $newsletter->store_id=$request['storeId'];
            $newsletter->mail=$request['email'];
            $newsletter->save(); 
            
            $details=['name'=>'dealrated','store'=>$storeName];
            Mail::to($email)->send(new subscription($storeName));
            $response = array('status'=> 200, 'message'=>"Thankyou, We will update you as soon as we discover coupons for this store.");
            return response()->json($response);
        }
        
    }
    
    
    public function topCategories(){
        
        return DB::select("SELECT cat.*,SUM(sc.coupon_used) as cat_usage FROM (SELECT c.id as coupon_id,c.coupon_used,sc.cat_id,sc.store_id FROM coupons c INNER JOIN store_categories sc ON c.store_id = sc.store_id)as sc INNER JOIN categories as cat ON cat.id =  sc.cat_id where cat.status=1 GROUP BY sc.cat_id ORDER BY cat_usage DESC LIMIT 5");
 
    }
    
    public function navCategories(){
        
        $nav_cate= DB::select("SELECT cat.*,SUM(sc.coupon_used) as cat_usage FROM (SELECT c.id as coupon_id,c.coupon_used,sc.cat_id,sc.store_id FROM coupons c INNER JOIN store_categories sc ON c.store_id = sc.store_id)as sc INNER JOIN categories as cat ON cat.id = sc.cat_id WHERE cat.status = 1 GROUP BY sc.cat_id ORDER BY `cat`.`id` ASC");
        return $nav_cate;
        
    }
    
    public function discoveredMonth($coupon){
            $date1 = DateTime::createFromFormat('Y-m-d H:i:s', $coupon['created_at']);
            $date2 = new DateTime();
            $diff = date_diff($date1,$date2);
            $total =$diff->format("%R%a");
           
            $days =str_replace("+","",$total);
           
            if($days>=30){
                $days = floor($days / 30);
                $months = $days % 30;
                
            return   $coupon['discovered'] = $months . " month ago ";
            }else if($days>60){
                $days = floor($days / 30);
                $months = $days % 30;
            return   $coupon['discovered'] = $months . " months ago ";
            }else if($days==0){
             return   $coupon['discovered']="Today";
            }else if($days==1){
             return   $coupon['discovered']="1 day ago";
            }else if($days>365){
                $days = floor($days / 30);
                $year = $days / 365;
                $months = $days % 30;
                 $coupon['discovered'] = $year . " Year ago ";
            }
            else{
             return   $coupon['discovered']=$days." days ago";
            }
    }

    public function lastUsedMonth($vars){
        foreach ($vars as $coupon) {
            if($coupon->updated_at!= null){
                $date1 = DateTime::createFromFormat('Y-m-d H:i:s', $coupon->updated_at);
                $date2 = new DateTime();
                $diff = date_diff($date1,$date2);
                $total =$diff->format("%R%a");
                $days =str_replace("+","",$total);
                if($days>30){
                    $days = floor($days / 30);
                    $months = $days % 30;
                 return   $coupon->lastused = $months . " months & " . $days . " days";
                }
                else{
                 return   $coupon->lastused=$days;
                }
            }else{
             return   $coupon->lastused="_______";
            }
            
        }
    }

    public function getMax($array){ 
       $n = count($array);  
       $max = $array[0]; 
       for ($i = 1; $i < $n; $i++)  
           if ($max < $array[$i]) 
               $max = $array[$i]; 
        return $max;        
    }
    
    public function couponLikeCounter($id,Request $request){
        Coupon::find($id)->increment('is_like',$request->is_like);
        $response = array('status'=> 200, 'message'=>"Update coupon like Successfully");
        return response()->json($response);
        
    }
    
    
    public function getRelatedStore($slug, Request $request){
        
        $data['storedetail']=Store::where('slug','=',$slug)->first();
        $data['assets_front']=url('/framework/public/');
        $data['meta_title']='';
        $data['meta_description']='';
        $data['description']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['schemaQues']='';
        $data['title']='DealRated.com - Coupons, Discounts and Promo Codes';
        if($data['storedetail']){
            $id=$data['storedetail']->id;
            $slug=$data['storedetail']->slug;
            $store_category=Storecategory::where('store_id','=',$data['storedetail']->id)->get();
            
            
            
            $catidsStr = '';
            foreach($store_category as $category){
                $catids[]=$category->cat_id;
                $catidsStr .= $category->cat_id.",";
            }
    
            $catidsStr = substr($catidsStr,0,-1);
            $data['stores'] = DB::select("SELECT s.* FROM `coupons` c INNER JOIN stores s ON c.store_id = s.id  WHERE s.id !=  $id AND s.id IN (SELECT store_id FROM `store_categories` WHERE `cat_id` IN ($catidsStr)) GROUP BY s.id");
            
        } 
        
        return Response::view('relatedStore',$data);
        
        
    }
    
    
    public function getPopularRelatedStore($slug, Request $request){
        $data['storedetail']=Store::where('slug','=',$slug)->first();
        if($data['storedetail']){
            $id=$data['storedetail']->id;
            $slug=$data['storedetail']->slug;
            $store_category=Storecategory::where('store_id','=',$data['storedetail']->id)->get();
            
            $catidsStr = '';
            foreach($store_category as $category){
                $catids[]=$category->cat_id;
                $catidsStr .= $category->cat_id.",";
            }
            
            $storecates=DB::table('store_categories')->select('store_id')->whereIn('cat_id', $catids)->get();
            foreach ($storecates as $storecate) {
                $storeIds[]=$storecate->store_id;
            }
            $data['popularstore']=DB::Select("SELECT s.id, s.store_name,s.slug, SUM(coupon_used) as max_used FROM coupons c LEFT JOIN stores s ON c.store_id = s.id WHERE s.id IN (SELECT store_id FROM store_categories WHERE cat_id IN (SELECT cat_id FROM store_categories sc INNER JOIN stores s ON sc.store_id = s.id where s.slug = '$slug')) GROUP BY c.store_id ORDER BY max_used DESC LIMIT 5");
            $data['newrelatedstores']=DB::table('stores')->where('id','!=',$data['storedetail']->id)->whereIn('id',$storeIds)->orderBy('id','DESC')->limit(5)->get();
            $data['morerelatedstores']=DB::table('stores')->where('id','!=',$data['storedetail']->id)->whereIn('id',$storeIds)->orderBy('id','ASC')->limit(5)->get();
        }
        return Response::view('popularRelatedStore',$data);
    }

    public function getExpiredCoupon($slug, Request $request){
        $data['storedetail']=Store::where('slug','=',$slug)->first();
        $data['assets_front']=url('/framework/public/');
        $data['meta_description']='';
        $data['description']='';
        $data['meta_title']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['schemaQues']='';
        $expired=[];
        $data['title']='Dealrated.com - Coupons, Discounts and Promo Codes';
        
        if($data['storedetail']){
            $data['expierdcoupon']=Coupon::where('store_id','=',$data['storedetail']->id)->where('status','=',0)->get();
            if(count($data['expierdcoupon'])>0){    
                foreach($data['expierdcoupon'] as $exp){
                    $exp = (array) $exp->toArray();
                    $store=Store::where('id','=',$exp['store_id'])->first();
                    $exp['Storedetails'] = $store;
                    
                    $expired[] = $exp;
                }
            } 
            $data['expierdcoupon']=$expired;
            $data['countexpired']=count($data['expierdcoupon']);
        }
        
        return Response::view('expiredCoupon',$data);    
    }
    
    
    public function getCategoryRelatedStore($slug, Request $request){
        $data['categoryDetails']=Category::where('slug','=',$slug)->first();
        $data['assets_front']=url('/framework/public/');
        $data['meta_title']='';
        $data['meta_description']='';
        $data['description']='';
        $data['meta_image']='';
        $data['meta_url']='';
        $data['schemaQues']='';
        $data['title']='DealRated.com - Coupons, Discounts and Promo Codes';
        if($data['categoryDetails']){
            $cat_id=$data['categoryDetails']->id;
             $store_category=Storecategory::select('store_id')->where('cat_id','=',$data['categoryDetails']->id)->get();
            $storidsStr='';
            if(count($store_category)>0){
                foreach ($store_category as $store) {
                    $storidsStr .= $store->store_id.",";
                }
                
                $storidsStr = substr($storidsStr,0,-1);
                $data['stores']=DB::select("SELECT s.* FROM (SELECT c.store_id, SUM(coupon_used)as total_used FROM `coupons` c WHERE store_id IN ($storidsStr) GROUP BY store_id)as c INNER JOIN stores as s ON s.id = c. store_id");
            } 
        }
        return Response::view('categoryStore',$data); 
    }
    
    
    public function sendNewsletter(Request $request){
        $storeIds=[];
        $storeData=[];
        
        $coupon_details = DB::table('coupons as c1')->select('c1.*', 's1.*')
            ->leftJoin('stores as s1', 'c1.store_id', '=', 's1.id')
            ->where('c1.created_at', 'like', date('Y-m-d') . '%')->get();
        if(count($coupon_details)>0){
            
            foreach($coupon_details as $coupon){
                $storeId[]=$coupon->store_id;
            }
            $storeId = array_unique($storeId);
            
            $i = 0;
            $couponData = (array) $coupon_details->toArray();
            foreach($storeId as $store){
                
                $storeData[$i]['store'] = $store;
                
                $storeData[$i]['coupons'] = array_filter($couponData,  function ($var) use ($store) {
                    
                            return ($var->store_id == $store);
                            });
                $i++;
            }
            $newsletters=DB::table('newsletters as n')->select('n.*','s.*')->leftjoin('stores as s' ,'n.store_id','=','s.id')->whereIn('store_id', $storeId)->get();
            foreach($newsletters as $newsletter){
                 
                
                $storeId=$newsletter->store_id;
                $email=$newsletter->mail;
                $storeCoupons = array_filter($storeData,  function ($var) use ($storeId) {
                            return ($var['store'] == $storeId);
                        });
                    
                foreach($storeCoupons as $storeCoupon){
                    $storeCoupon['storeName']=$newsletter->store_name;
                    $storeCoupon['email']=$newsletter->mail;
                    $storeCoupon['coupons']=array_slice($storeCoupon['coupons'], 0, 2, true);
                }
                Mail::to($email)->send(new couponNewsletter($storeCoupon));
            }
            echo "mail send";
        }else{
            echo "no coupons";
        }
        
    }
    
    public function emailUnsubscribe(Request $request){
        $newsletter=Newsletter::where('store_id','=',$request['store'])->where('mail','=',$request['email'])->first();
        if($newsletter){
             $newsletter->delete();
             return redirect('/')->with('success','You have unsubscribe Successfully.');
        }else{
             return redirect('/');
        }
        
    }
    
  public function strposa($haystack, $avg=array(), $offset=0) {
        $chr = array();
        foreach($avg as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
}

/*end controller*/
}

 


