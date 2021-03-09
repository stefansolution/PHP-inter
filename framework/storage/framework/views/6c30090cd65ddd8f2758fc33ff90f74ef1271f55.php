<?php $__env->startSection('content'); ?>
 

    <?php echo $__env->make('front_layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
    <!---------------------------promo codes------------->
<div class="row top_coupons pb-4">
    <div class="container">

      <h1 class="text-center mb-4 mt-4"><?php echo e($storedetail->store_name); ?> (<?php echo e($couponCount); ?> Discounts & Promo Codes)</h1>
    <div class="coupon-list-container ">
    <?php if(count($coupons)>0): ?>
    <?php
        $i = 0;
    ?>
      <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($i<=2): ?>
       
      <div class="coupon-list-row promo_code " CouponId="<?php echo e($coupon['coupon_id']); ?>" index="<?php echo e($coupon['id']); ?>">
        <div class="coupon-info-container">
          <img class="coupon-logo" src="<?php echo e($assets_front); ?>/assets/images/loading70x70.gif" alt="<?php echo e($coupon['Storedetails']->store_name); ?> discount code" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($coupon['Storedetails']->image); ?>"/>
          
          
          
          <a class="coupon-info coupon-store" special-url="<?php echo e($coupon['Storedetails']->special_url); ?>"  href="https://dealrated.com/store/<?php echo e($coupon['Storedetails']->slug); ?>#c=<?php echo e($coupon['coupon_id']); ?>">
        
            <div class="coupon-heading">
            <?php echo e($coupon['Storedetails']->store_name); ?>

            </div>
            <div class="coupon-line-1"><?php echo e($coupon['description']); ?></div>
            <div class="coupon-domain">at <strong><?php echo e($coupon['Storedetails']->domain); ?></strong></div>
          </a>
        </div>
        <div class="coupon-feature discovered ">
          <div class="coupon-feature-title">Discovered</div>
          <div class="coupon-feature-value"><?php echo e($coupon['discovered']); ?></div>
        </div>
        <div class="coupon-feature ">
          <div class="coupon-feature-title">Coupon used</div>
          <div class="coupon-feature-value">
          <?php if($coupon['coupon_used']>0): ?>
              <span class="coupon_used"><?php echo e($coupon['coupon_used']); ?></span> times
            <?php endif; ?>
          </div>
      
        </div>
        <div class="coupon-feature ">
          <div class="coupon-feature-title">Last used</div>
          <div class="coupon-feature-value">Today</div>
        </div>
        <?php if($coupon['Storedetails']->reveal_code==1): ?>
        <div class="coupon-button  reveal-copy-code" store-slug="<?php echo e($coupon['Storedetails']->slug); ?>"  coupon="<?php echo e($coupon['code']); ?>">
            <span>Copy code </span>
            <span><?php echo e($coupon['code']); ?></span>
        </div>
        <?php else: ?>
        <div class="coupon-button  store-copy-copon" store-slug="<?php echo e($coupon['Storedetails']->slug); ?>"  coupon="<?php echo e($coupon['code']); ?>">
            Show code
        </div>
        <?php endif; ?>
      </div>
      <?php
      $i++
      ?>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if(count($coupons)>3): ?>
      <div class="text-center mt-4"><button type="button" style="background-color:#41C685;" class="btn btn-success load-more"><a href="#q5" style="color:white">More coupons for <?php echo e($coupon['Storedetails']->store_name); ?> below</a></button>
      </div>
     <?php endif; ?>
      
     <?php else: ?>
            <h3 class="text-center mb-4 mt-4">Coupons not Found.</h3>
     <?php endif; ?> 
      </div>
  </div>

</div>
<!------------------end promo codes----------------->
<!------------------about retrospec--------------->
<div class="container-fluid">
    <div class="container about_retrospec pt-4 pb-4 mt-4">
        <h4 class="mb-4"><b>ABOUT <?php echo e(strtoupper($storedetail->store_name)); ?> </b></h4>
      <div class="row mb-4">
          <div class="col-12 p-0">
            <div class="coupon-info-container about-info-container">
                <img class="coupon-logo rounded-circle store-domain" special-url="<?php echo e($storedetail->special_url); ?>" alt="<?php echo e($storedetail->store_name); ?> discount code" id="coupon-store-image" src="<?php echo e($assets_front); ?>/assets/images/loading70x70.gif" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($storedetail->image); ?>">
              <a class="coupon-info" >
              <div class="coupon-line-1 store-domain" special-url="<?php echo e($storedetail->special_url); ?>"><?php echo e($storedetail->store_name); ?></div>
              <div class="coupon-domain"><?php echo e($storedetail->domain); ?></div>
              </a>
            </div>
                <?php $__currentLoopData = $storecategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storecategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
              <a style="float:left;" class="m-1" href="<?php echo e(url('category/'.$storecategory->slug)); ?>"><button type="button"  class="btn btn-success"><?php echo e($storecategory->category_name); ?></button></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="col-md-10 col-xs-12 p-0 right mt-3 ">
            <?php $__currentLoopData = $store_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('/category/')); ?>/<?php echo e($row->slug); ?>" class="btn btn-success m-0 mb-1"><?php echo e($row->category_name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
      </div>
     <!--  <h6 class="mb-4">L.A. Gear that gets you.</h6> -->
     <?php if(count($coupons)>0): ?>
      <h5 class="mb-2"><b>ABOUT OUR <?php echo e(strtoupper($storedetail->store_name)); ?> COUPONS </b> <span class="store-icon mr-1">🏷</span></h5>
      <p>Dealrated currently has <?php echo e($couponCount); ?> active discount codes for <?php echo e(strtoupper($storedetail->store_name)); ?>. Our top deal will save you <?php echo e($couponoff); ?> at <?php echo e(strtoupper($storedetail->store_name)); ?>. We've also discovered other coupons for <?php echo e($couponoff); ?>.</p>
      <p>Our latest promo code was found on <?php echo e(date('M d, Y',strtotime($lastupdated['updated_at']))); ?>.
      <?php if($everyday!=0): ?>
      In the last <?php echo e($lastday); ?> days Dealrated has found <?php echo e($couponCount); ?> new <?php echo e(strtoupper($storedetail->store_name)); ?> promo codes. On average we discover a new <?php echo e(strtoupper($storedetail->store_name)); ?> discount code every <?php echo e($everyday); ?> days. 
      <?php endif; ?>
      <?php echo e(strtoupper($storedetail->store_name)); ?> shoppers told us they save an average of <?php if($avg_type=='$'): ?> $<?php echo e($avg_saving); ?> <?php else: ?> <?php echo e($avg_saving); ?>% <?php endif; ?>  with our codes.
      </p>
        <!--<p></p>-->
      <?php endif; ?>
    </div>
</div>
<!------------------------end about retrospec------------->
<!----------------------discount codes------------------->
 <div class="container discount_codes mt-4 pt-4">
      <h2 class="text-center mb-4">Our <?php echo e($storedetail->store_name); ?> Coupons, Promos and Discount Codes</h2>
    <div class="row mt-4 pt-4 mb-4 pb-4">
        <div class="col-md-6 col-xs-12">
        <table class="table">
        <tbody>
         <tr>
          <td><div class="table-items"><span class="store-icon mr-1">💰</span> Average Saving:</div></td>
          <td>
              <?php if($avg_type=='$'): ?>
              <div class="table-items">$<?php echo e($avg_saving); ?></div>
              <?php else: ?>
              <div class="table-items"><?php echo e($avg_saving); ?>% </div>
              <?php endif; ?>
              </td>
          </tr>
          <tr>
          <td style="width: 200px;"><div class="table-items"><span class="store-icon mr-1">💸</span> Coupons Available:</div></td>
          <td><div class="table-items"><?php if($couponCount==0): ?>
                    NA
              <?php else: ?>
                <?php echo e($couponCount); ?>

              <?php endif; ?>
            </div>
          </td>
          </tr>
          <tr>
          <td><div class="table-items"><span class="store-icon mr-1">👍</span> Best Coupon:</div></td>
          <td><div class="table-items"><?php if($couponoff): ?>
                  <?php echo e($couponoff); ?>

              <?php else: ?>
                
                NA
              <?php endif; ?>  
              </div>
          </td>
          </tr>
           <tr>
          <td><div class="table-items"><span class="watch-icon mr-1">🕒</span> Last Updated:</div></td>
          <td><div class="table-items"><?php if($lastupdated['updated_at']==null): ?>
                  NA
              <?php else: ?>
                
                <?php echo e(date('M d, Y ',strtotime($lastupdated['updated_at']))); ?>

              <?php endif; ?> 
              </div>
           </td>
          </tr>
        </tbody>
            </table>
      </div>
        <div class="col-md-6 col-xs-12">
          <ul>
              <?php if($couponCount>3): ?>
            <li><a href="#q0"><?php echo e($couponCount); ?> active <strong> <?php echo e($storedetail->store_name); ?></strong> promo codes</a></li>
            <?php endif; ?>
            <?php if($countexpired>1): ?>
               <li><a href="#q6"><?php echo e($countexpired); ?> old & expired <strong><?php echo e($storedetail->store_name); ?></strong> discounts</a></li>
            <?php endif; ?>   
           <?php if(count($coupons)>0): ?>    
               <li><a href="#q1"><span>🗓 </span>When does <?php echo e($storedetail->store_name); ?> release new coupon codes?</a></li>
              <li><a href="#q2">🤔 How do I use promo codes for <?php echo e($storedetail->store_name); ?>?</a></li>
           <?php endif; ?>    
               <li><a href="#q3"><span>🛍 </span>Where do I get the latest discounts for <?php echo e($storedetail->store_name); ?>?</a></li>
               <!-- <li><a href="#q4">What is the best way to save money when I shop online?</a></li> -->
               <!-- <li>Can I submit a <?php echo e($storedetail->store_name); ?> coupon code? -->
        </ul>
      </div>
    </div>
 </div>

<!--------------------end discount codes---------------->
<!---------------------top coupons---more active and expired coupon--------------->
<div class="row top_coupons more-active-epixred-coupon pb-4 mb-4" id="q5">
    <div class="container mb-4">
   <?php if($couponCount>3 || $countexpired>0): ?> 
      <h3 class="text-center mb-4"><b>More <?php echo e($storedetail->domain); ?> coupons & discount codes</b></h3>
    <?php endif; ?>
        <div class="coupon-list-container ">
        <?php if(count($coupons)>3): ?>
        <h5 class="text-center mb-3 text-uppercase" id="q0"><?php echo e($couponCount-3); ?> active coupon codes for <?php echo e($storedetail->store_name); ?></h5>
        <?php endif; ?>
        
        <?php if(count($coupons)>=3): ?>
        <?php
            $i = 0;
        ?>
        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($i > 2): ?>
        
        <div class="coupon-list-row coupons_used" CouponId="<?php echo e($coupon['coupon_id']); ?>" index="<?php echo e($coupon['id']); ?>">
            <div class="coupon-info-container">
              <img class="coupon-logo" src="<?php echo e($assets_front); ?>/assets/images/loading70x70.gif" alt="<?php echo e($coupon['Storedetails']->store_name); ?> discount code" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($coupon['Storedetails']->image); ?>"/>
              <a class="coupon-info mob-order-1 coupon-store" special-url="<?php echo e($coupon['Storedetails']->special_url); ?>" href="https://dealrated.com/store/<?php echo e($coupon['Storedetails']->slug); ?>#c=<?php echo e($coupon['coupon_id']); ?>">
                <div class="coupon-heading">
                <?php echo e($coupon['Storedetails']->store_name); ?>

                </div>
                <div class="coupon-line-1"><?php echo e($coupon['description']); ?></div>
                <div class="coupon-domain">at <strong><?php echo e($coupon['Storedetails']->domain); ?></strong></div>
              </a>
            </div>
            <div class="coupon-feature  mob-order-3 discovered">
              <div class="coupon-feature-title">Discovered</div>
              <div class="coupon-feature-value"><?php echo e($coupon['discovered']); ?></div>
            </div>
            <div class="coupon-feature mob-order-4">
              <div class="coupon-feature-title">Coupon used</div>
              <div class="coupon-feature-value">
              <?php if($coupon['coupon_used']>0): ?>
                 <span class="coupon_used"> <?php echo e($coupon['coupon_used']); ?></span> times
                <?php endif; ?>
              </div>
            </div>
            <div class="coupon-feature mob-order-4">
              <div class="coupon-feature-title">Last used</div>
              <div class="coupon-feature-value">
                Today
              </div>
            </div>
            <?php if($coupon['Storedetails']->reveal_code==1): ?>
            <div class="coupon-button mob-order-4 reveal-copy-code" store-slug="<?php echo e($coupon['Storedetails']->slug); ?>"  coupon="<?php echo e($coupon['code']); ?>">
                <span>Copy code </span>
                <span><?php echo e($coupon['code']); ?></span>
                
            </div>
            <?php else: ?>
            <div class="coupon-button mob-order-4 store-copy-copon" store-slug="<?php echo e($coupon['Storedetails']->slug); ?>"  coupon="<?php echo e($coupon['code']); ?>">
                Show code
            </div>
            <?php endif; ?>
        </div>
       <?php endif; ?>
      <?php
      $i++
      ?>
    
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
        <div class="expired-coupon"></div>    
        
        
    </div>
  </div>
</div>

<!-----------------accordion------------------->
    <div class="container">
    <div id="accordion">
    <?php if(count($coupons)>0): ?> 
      <div class="card" id="q1">
   
        <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" ><h3><span>🗓 </span>
            When does <?php echo e($storedetail->store_name); ?> release new coupon codes?
        </h3></div></a>
       
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Recently, we’ve been able to find a new discount code from <?php echo e($storedetail->store_name); ?>   
          <?php if($everyday==0): ?>
            <strong>every day</strong>.
          <?php elseif($everyday==1): ?>
            <strong>every <?php echo e($everyday); ?> day</strong>.  Over the past month we’ve found <?php echo e($couponCount); ?> new coupons from <?php echo e($storedetail->store_name); ?>.
          <?php else: ?>
          <strong>every <?php echo e($everyday); ?> days</strong>.  Over the past month we’ve found <?php echo e($couponCount); ?> new coupons from <?php echo e($storedetail->store_name); ?>.
          <?php endif; ?>
          
        </div>
        </div>
      </div>
      <?php endif; ?> 
      <div class="card mt-3" id="q2">
          <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" >🤔 How do I use promo codes for <?php echo e($storedetail->store_name); ?>?
      
          </div></a>
        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          When you are viewing your cart and about to checkout on  <?php echo e($storedetail->domain); ?>, be sure to look out for a field that asks you to enter a code for a discount.
        </div>
        </div>
      </div>
      <div class="card mt-3" id="q3">
         <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" ><h3><span>🛍 </span>
        Where do I get the latest discounts for <?php echo e($storedetail->store_name); ?>?
        </h3></div></a>
        <div id="collapseThree" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        Subscribe to DealRated email alerts for <?php echo e($storedetail->store_name); ?> and you will never miss a coupon again. Every time we find a new discount code, we’ll send you an email. Subscribe, and stay on top of the latest deals. 
          <form id=subscribe-form>
              <div class="input-group mb-3 mt-3 col-md-4 subscribe">
                <input type="text" class="form-control" index="<?php echo e($storedetail->id); ?>" store="<?php echo e($storedetail->store_name); ?>" name="q" id="subscribe" placeholder="Email">
                <div class="input-group-append">
                  <button type="button" class="btn btn-subscribe">Subscribe</button>
                  <!-- <span class="input-group-text">Subscribe</span> -->
                </div>
                <span class="subscribe-success"></span>
              </div>
          </form>
        </div>
        </div>
      </div>
     <!-- <div class="card mt-3" id="q4">
         <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" >
        What is the best way to save money when I shop online?
        </div></a>
        <div id="collapseThree" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          We recommend using the <a href="javasript:void(0);" >Dealrated Chrome Extension</a> to make sure that you never miss a deal when you shop online. The Dealrated for Google Chrome automatically finds discounts and coupon codes for you while you shop. You get the best discounts every time you shop, without having to search for coupon codes online.
        </div>
        </div>
      </div> -->     
    </div>
    </div>
<!----------------end accordion----------------->
<!--------------------top stores-------------------------->

       <div class="related-store-container"></div>
        
<!------------------------top categories------------------>
   <div class="popular-related-store-container"></div>   
 
    <?php echo $__env->make('front_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/store.blade.php ENDPATH**/ ?>