<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User as User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
    	auth()->setDefaultDriver('api');
        $this->middleware('auth:api', ['except' => ['me','login','registration','refresh','logouttest']]);
    //   $this->middleware('cors');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['status'=>false,'error' => 'Invalid Credentials'], 200);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
  
      try {
            $user = auth()->userOrFail();
      } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
          $error = $e->getMessage(); 
      return response()->json(['status'=>false, 'error'=>['token'=>[$e->getMessage().' in token']]], 200);  
        }
   
    
      $userData = auth()->user();
      if(!is_null($userData->image_path)){
          
          $userData->image_path =  url('/').'/images/profileimages/'.$userData->image_path;
          
          $userData->image_path = str_replace('server.php','public',$userData->image_path );
      } 
      
      $first_name = $userData->name;
      unset($userData->name);
      $userData->first_name = $first_name;
      
      $show_address_on_ads = (int) $userData->show_address_on_ads;
      $userData->show_address_on_ads =   $show_address_on_ads;
      
      $resonseData = array('status'=>true,'user'=>$userData);
    
      return response()->json($resonseData);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logouttest()
    {
        
        try {
                $user = auth()->userOrFail();
            } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
                // do something
                
                $error = $e->getMessage(); 
               return response()->json(['status'=>false, 'error'=>['token'=>[$e->getMessage().' in token']]], 200);  
            
            }
       
        auth()->logout();

        return response()->json(['status'=>true,'message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
       
        
        try {
                $user = auth()->userOrFail();
            } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
                
                $error = $e->getMessage(); 
              return response()->json(['status'=>false, 'error'=>['token'=>[$e->getMessage().' in token']]], 200);  
            
            }
            
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$check= true)
    {
        
        
        if(!$check){
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 1440
            ]);
            
        }
        
        $user = Auth::user();
      
        if($user->status == 2){
        
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 1440
            ]);
        }else{
            	return response()->json(['status'=>false,'message'=>'Your account is not active. Please contact to Adminstrator.'], 200);    
            
        }
    }


	
	  
	public function registration(Request $request) 
    { 
        
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'login_type' => 'required'
        ]);
        
       	if ($validator->fails()) { 
				return response()->json(['status'=>false,'error'=>$validator->errors()], 200);            
		}
		
        $input = $request->all(); 
         
        if($input['login_type'] == 'web'){
            $user=$request->all();
		  
      		  $validator = Validator::make($request->all(), [ 
      				'first_name' => 'required',
      				'last_name' => 'required',
      				'email' => 'required|email|unique:users',
      				'password' =>'required'
      				
      			   
      			]);
      			if ($validator->fails()) { 
      				return response()->json(['status'=>false,'error'=>$validator->errors()], 200);            
      			}
            $lastName=substr($user['last_name'], 0, 3);
            $uniqueId=rand(100,1000);
            $firstName=explode(" ",$user['first_name']);
            $uniqueUserName=$lastName.$firstName[0].$uniqueId;
      			$pw = $request->password;
      	
      			$user =new User;
      			$user->name = $request->first_name;
      			$user->last_name = $request->last_name;
      			$user->email = $request->email;     
            $user->username=$uniqueUserName;
      			$user->Password=Hash::make($pw);
      			$user->status = 2;
      			$user->save();
      			 // echo $user->id;

      			return response()->json(['status'=>true,'message'=>'Registration Successfully.'], 200);   
        
        }else if($input['login_type'] == 'facebook' || $input['login_type'] == 'google'){
            
            $already = User::where('email',$input['email'] )->get()->count();
            
            if($already > 0){
              
                $user = User::where('email',$input['email'] )->first();
                
       
                if($user['status'] == 2){
                $token = auth()->tokenById($user->id);
                return $this->respondWithToken($token,false);
                }else{
                    	return response()->json(['status'=>false,'message'=>'Your account is not active. Please contact to Adminstrator.'], 200);   
                }
               
            }else{
                  $pw = bcrypt('%s=adfh8sdf');
                  $user=$request->all();
                  $UserName=substr($user['last_name'], 0, 3);
                  $uniqueId=rand(100,1000);
                  $lastName=explode(" ",$user['first_name']);
                  $uniqueUserName=$UserName.$lastName[0].$uniqueId;
        		    	$user =new User;
            			$user->name = $request->first_name;
            			$user->last_name = $request->last_name;
            			$user->email = $request->email;
            			$user->Password=Hash::make($pw);
                  $user->username=$uniqueUserName;
            			$user->status = 2;
            			$user->save();

                $token = auth()->tokenById($user->id);
                return $this->respondWithToken($token);
            } 
        }else{
			return response()->json(['status'=>false, 'error'=>['login_type'=>['Invalid login type']]], 200);            
        }
    }


    
}