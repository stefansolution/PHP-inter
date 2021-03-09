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

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (isset($_GET['store'])){
          $stores = Store::Where('store_name', 'like', '%' . $_GET['store'] . '%')->orderBy('id', 'DESC')->paginate(20);
        }else{
            $stores=Store::paginate(20);
        } 
        $categories=Category::all();
        return view('Admin::stores.stores',compact('stores','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories=Category::all();
        return view('Admin::stores.add_store',compact('categories'));
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
        $validator = Validator::make($request->all(), [ 
            'category' => 'required',
            "store_name" => 'required',
            'status' => 'required',
            "domain" => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }
        
        
        if ($request->file('image')) {
            $image_name =$request->file('image')->getClientOriginalName();
            $destination_path=public_path('/assets/store_images/');
            $request->file('image')->move($destination_path,$image_name);
        }
        
        if($request->store_name){
            $storename =$request->store_name;
            $name = clean($storename);
            $slug=$name;
        }
        
        if($request->has('reveal_code')){
           $reveal_code=1;
        }else{
            $reveal_code=0;
        }
       
        $store= new Store;
        $store->store_name=$request->store_name;
        $store->slug=$slug;
        $store->description=$request->description;
        $store->domain=$request->domain;
        $store->image=$image_name;
        $store->is_manual=1;
        $store->image_scraped=1;
        $store->status=$request->status;
        $store->special_url=$request->special_url;
        $store->reveal_code=$reveal_code;
        $store->Save();
        if($request->category){
           
            foreach($request->category as $cat){
                $store_categories= new Store_categories;
                $store_categories->cat_id=$cat;
                $store_categories->store_id=$store->id;
                $store_categories->save();
            }
            
        }
        return redirect('/stores')->with('success','Store Saved Successfully.');
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
        $category=[];
        $store=Store::find($id);
        $catIds=[];
        $categoryIds=Store_categories:: select('cat_id')->where('store_id','=',$id)->get();
        foreach($categoryIds as $cat){
            $catIds[]=$cat->cat_id;
        }
        $categories=Category::all();
        return view('Admin::stores.edit_store',compact('store','categories','catIds'));
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
            'category' => 'required',
            "store_name" => 'required',
            'status' => 'required',
            "domain" => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 200);            
        }
        $store= Store::find($id);
        
        if ($request->file('image')) {
            $image_name =$request->file('image')->getClientOriginalName();
            $destination_path=public_path('/assets/store_images/');
            $previous=$store->image;
            if (file_exists($destination_path.$previous)) {
                unlink($destination_path.$previous);
             }
            $request->file('image')->move($destination_path,$image_name);
        }else{
            $image_name=$store->image;
        }
        
        if($request->store_name){
            $storename =$request->store_name;
            $name = clean($storename);
            $slug=$name;
        }
        
        if($request->has('reveal_code')){
           $reveal_code=1;
        }else{
            $reveal_code=0;
        }
        
        $store->store_name=$request->store_name;
        $store->slug=$slug;
        $store->description=$request->description;
        $store->domain=$request->domain;
        $store->image=$image_name;
        $store->status=$request->status;
        $store->special_url=$request->special_url;
        $store->reveal_code=$reveal_code;
        $store->Update();
        if($store->Update()){
            Store_categories::where('store_id','=',$id)->delete();
                
            foreach($request->category as $cat){
                $store_categories= new Store_categories;
                $store_categories->cat_id=$cat;
                $store_categories->store_id=$store->id;
                $store_categories->save();
            }
        }
        
        return redirect('/stores')->with('success','Store Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store= Store::find($id);
        if($store->id){
            $store_categories=Store_categories::where('store_id','=',$store->id)->get();
            if($store_categories){
                foreach($store_categories as $sc){
                    $sc->delete();
                }
            }
            
            $coupons=Coupon::where('store_id','=',$store->id)->get();
            if($coupons){
                foreach($coupons as $cu){
                     $cu->delete();
                }
            }
            
        }
        $store->Delete();
        return redirect('stores')->with('success','Store Delete Successfully.');
    }  
}

function clean($string) {

   $string = str_replace(' ', '-', $string);// Replaces all spaces with hyphens.
  // return preg_replace('/[^A-Za-z0-9\-]/', '', trim(strtolower($string)));
   return trim(strtolower($string));
}




