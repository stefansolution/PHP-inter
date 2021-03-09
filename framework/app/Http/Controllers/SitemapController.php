<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Models\Store as Store;

use Illuminate\Support\Facades\DB;
class SitemapController extends Controller
{
    public function sitemapStores(Request $request){
        
        $stores = DB::table('stores as t1')
                    ->select('t1.slug as slug')
                    ->join('coupons as t2', 't1.id', '=', 't2.store_id')->where('t1.status','=',1)->where('t1.image_scraped','=',1)->where('t1.image','not like', "%wethrift%")
                   ->distinct()
                    ->get();
        return response()->view('sitemap.stores', [
            'stores' => $stores,
        ])->header('Content-Type', 'text/xml');
    }
}
