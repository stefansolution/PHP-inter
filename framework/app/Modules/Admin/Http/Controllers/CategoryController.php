<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Category as Category;
use App\Modules\Admin\Models\Store_categories as Store_categories;
use App\Modules\Admin\Models\Admin as Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['category'])){
          $categories = Category::Where('category_name', 'like', '%' . $_GET['category'] . '%')->orderBy('id', 'DESC')->get();
        }else{
            $categories = Category::all();
        } 
        return view('Admin::categories.categories',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::categories.add_categories');
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
         $request->validate([
            'category_name' => 'required|unique:categories',
            'status' => 'required',
        ]);
        
        if($request->category_name){
            $catename =$request->category_name;
            $name = clean($catename);
            $slug=$name;
        }
        $category= new Category;
        $category->category_name=$request->category_name;
        $category->slug=$slug;
        $category->status=$request->status;
        $category->Save();
        return redirect('/categories')->with('success','Category Saved Successfully.');
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
        $category=Category::find($id);
        return view('Admin::categories.edit_categories',compact('category'));
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
        
       
        $request->validate([
            'category_name' => 'required|unique:categories',
            'status' => 'required',
        ]);
        
        if($request->category_name){
            $catename =$request->category_name;
            $name = clean($catename);
            $slug=$name;
        }
        $category= Category::find($id);
        $category->category_name=$request->category_name;
        $category->status=$request->status;
        $category->slug=$slug;
        $category->Update();
        return redirect('/categories')->with('success','Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $store_categories=Store_categories::where('cat_id','=',$id)->delete();
        $category= Category::find($id)->Delete();
        return redirect('categories')->with('success','Category Delete Successfully.');
    } 
    
    
    public function validateAdminEmailCheck(Request $request)
      {
        
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

function clean($string) {

   $string = str_replace(' ', '-', $string);// Replaces all spaces with hyphens.
  // return preg_replace('/[^A-Za-z0-9\-]/', '', trim(strtolower($string)));
   return trim(strtolower($string));
}




