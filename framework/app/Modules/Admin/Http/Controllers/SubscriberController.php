<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Category as Category;
use App\Modules\Admin\Models\Coupon as Coupon;
use App\Modules\Admin\Models\Store as Store;
use App\Modules\Admin\Models\Store_categories as Store_categories;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function listing(){
        if(isset($_GET['email'])){
            $email = $_GET['email'];
             $subscribers = DB::table('newsletters')
                        ->join('stores','stores.id','=','newsletters.store_id')
                        ->where('newsletters.mail','like','%'.$email.'%')
                        ->select(DB::raw('newsletters.mail,GROUP_CONCAT(stores.store_name ORDER BY newsletters.id desc  SEPARATOR ", ") as stores'))
                        ->orderBy('newsletters.id','desc')
                        ->groupBy('newsletters.mail')
                        ->get();
        }else{
             $subscribers = DB::table('newsletters')
                        ->join('stores','stores.id','=','newsletters.store_id')
                        ->select(DB::raw('newsletters.mail,GROUP_CONCAT(stores.store_name ORDER BY newsletters.id desc  SEPARATOR ", ") as stores'))
                        ->orderBy('newsletters.id','desc')
                        ->groupBy('newsletters.mail')
                        ->get();
        }
       
        return view('Admin::subscribers.subscribers',compact('subscribers'));
    }
    
    public function deleteSubscriber(Request $request){
        $email = $request->input('email');
        DB::table('newsletters')->where('mail',$email)->delete();
        return redirect()->back()->with('success','Subscriber removed successfully.');
    }
    
}