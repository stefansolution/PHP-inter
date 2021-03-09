<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
     //use Notifiable;
    protected $table = 'coupons';
    
    /*public function getCoupons(){
        return $this->hasManyThrough('App\Modules\Admin\Models\Coupon', 'App\Modules\Admin\Models\Store');
    }*/
    
    
    public function getstore(){
    	return $this->hasMany('App\Modules\Admin\Models\Store','id','store_id');
 
    }
}
