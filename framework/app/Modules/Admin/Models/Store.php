<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
     //use Notifiable;
    protected $table = 'stores';
    
    /*public function getCoupons(){
        return $this->hasManyThrough('App\Modules\Admin\Models\Coupon', 'App\Modules\Admin\Models\Store');
    }*/
    
    /* public function getCoupons(){
       
        return $this->hasMany('App\Modules\Admin\Models\Coupon');
    }*/
    
    public function getCoupon(){
    	return $this->hasMany('App\Modules\Admin\Models\Coupon','store_id','id');
 
    }
}
