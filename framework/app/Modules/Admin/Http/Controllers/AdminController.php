<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Admin as Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Modules\Admin\Models\Store as Store;
use Illuminate\Support\Facades\DB;
use Session;
class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Admin::welcome");
    }

    public function dashboard()
    {
        $stores=Store::all()->count();
        $scraped_Stores=DB::select("SELECT COUNT(*)as total_Store FROM `stores` as s LEFT JOIN (SELECT id,store_id, COUNT(*)
                         as total_coupons FROM coupons GROUP BY store_id) as t ON s.id = t.store_id WHERE s.`coupon_scraped` = 1  AND t.total_coupons>=0
                        ");
        return view("Admin::dashboard",compact('stores','scraped_Stores'));
    }
    
    public function adminProfile()
    {

        $admin = \Auth::guard('admin')->user();
        $adminData['id'] =$admin->id;
        $adminData['name'] = $admin->name;
        $adminData['email'] = $admin->email; 
        return view('Admin::profile',compact('adminData'));
    }

    public function editView($id)
    {
        $admin = Admin::find($id);

        return view('Admin::editprofile',compact('admin'));
    }
    public function updateProfile($id, Request $request)
    {
    
        $email = $request->input('email');

        $already = Admin::where('id','!=',$id)->where('email',$email)->get()->count();
       if(!$already){
       $admin = Admin::find($id);
            if($admin) {
                $admin->email = $email;
                $admin->save();
            }

        $name=$admin->name;    
        $adminData['id'] =$id;
        $adminData['email'] = $email;
        $adminData['name']=$name;
        session(['adminSessionData' => $adminData]);
        return redirect('/editProfile/'.$id)->with('success','Updated successfully.');
       }else{
            return redirect('/editProfile/'.$id)->with('error','This email id is already exist'); 
       }
    }

    public function changePasswordView()
    {
         return view('Admin::changepassword');
    }

    public function changePasswordStore($id, Request $request)
    {
        $password = $request->input('password');
        $admin = Admin::find($id);
        if($admin) {
            $admin->password = Hash::make($password);
            $admin->save();
        }
        return redirect('/changePassword')->with('success','Password changed successfully.');
    }
    
    public function validateAdminEmailCheck(Request $request)
      {
          dd($request->all());
        $id=$request['id'];
        $email=$request['email'];
        $already = Admin::where('id','!=',$id)->where('email',$email)->get()->count();
        
         if($already){
          echo json_encode(false);
         }else{
          echo json_encode(true);
         }
         die;
      }   

    

}

