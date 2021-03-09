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
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (isset($_GET['q'])){
           $title=$_GET['q'];
           $coupons = DB::table('coupons as c')->select('c.*')
           ->join('stores as s', 'c.store_id', '=', 's.id')
           ->where('s.store_name', 'like', '%' . $title . '%')
           ->orwhere('c.description','like','%' .$title.'%')
           ->orderBy('id', 'DESC')->paginate(20);
        }else{
            $coupons=Coupon::paginate(20);
        } 
        $stores=Store::all();
        return view('Admin::coupons.coupons',compact('coupons','stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stores=store::all();
        return view('Admin::coupons.add_coupon',compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //////////// new + new custom fields////////
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [ 
            "code" => 'required',
            "coupon_off" => 'required',
            "status" => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }
        
        
        
        if($request->storeId){
            $random = Str::random(10);
            $coupon_id=$request->storeId.'XL'.$random.$request->storeId.'DR';
           
            $coupon= new Coupon;
            $coupon->store_id=$request->storeId;
            $coupon->code=$request->code;
            $coupon->coupon_id=$coupon_id;
            $coupon->description=$request->description;
            $coupon->deal_id=$random;
            $coupon->coupon_off=$request->coupon_off;
            $coupon->discount_type=$request->discount_type;
            $coupon->avg_saving=$request->avg_saving;
            $coupon->status=$request->status;
            $coupon->Save();
            return redirect('/coupons')->with('success','Coupon Saved Successfully.');
        }else{
             return redirect('/coupons/create')->with('error','please select store.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupon::find($id);
        $store=Store::select('id','store_name')->where('id','=',$coupon->store_id)->first();
        $categoryIds=Store_categories:: select('cat_id')->where('store_id','=',$id)->get();
        return view('Admin::coupons.edit_coupon',compact('coupon','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
       $validator = Validator::make($request->all(), [ 
            'storeId' => 'required',
            "code" => 'required',
            "coupon_off" => 'required',
            "status" => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }
        
        $coupon= Coupon::find($id);
        $coupon->store_id=$request->storeId;
        $coupon->code=$request->code;
        $coupon->description=$request->description;
        $coupon->coupon_off=$request->coupon_off;
        $coupon->discount_type=$request->discount_type;
        $coupon->avg_saving=$request->avg_saving;
        $coupon->status=$request->status;
        $coupon->Update();
        return redirect('/coupons')->with('success','Coupon update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon= Coupon::find($id)->Delete();
        return redirect('coupons')->with('success','Coupons Delete Successfully.');
    }
     public function getStoreSuggestion(Request $request, $store){
        $stores= Store::select('id','store_name')->Where('store_name', 'like', '' .$store. '%')->orderBy('id', 'DESC')->get();
        $response = array('status'=> 200, 'message'=>"successfully.",'stores'=>$stores);
        return response()->json($response);
     }
}

function clean($string) {

   $string = str_replace(' ', '-', $string);// Replaces all spaces with hyphens.
  // return preg_replace('/[^A-Za-z0-9\-]/', '', trim(strtolower($string)));
   return trim(strtolower($string));
}




