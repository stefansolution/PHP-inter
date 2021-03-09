
<!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header-deal">
          <div class="coupon-info-container">
           <img class="coupon-logo rounded-circle"  src="<?php echo e($assets_front); ?>/assets/images/wow.png">
          <a class="coupon-info mob-order-1" href="javascript:void(0);">
            <div class="coupon-heading" id="coupon-heading">
            Coupon Code
            </div>
            <div class="coupon-line-1" id="coupon-line-1">30% off</div>
            <div class="coupon-line-2" id="coupon-line-2">at checkout</div>
          </a>
        </div>
         
          <button type="button" class="close model-close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-section-title">
		Copy the code to claim your discount at the checkout.
		</div>
        <div class="modal-copy-container">
            <form>
                <div class="input-group mb-3">
                  <input type="text" readonly class="form-control modal-copy-input" id="deal-popup-code"  aria-label="code" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-success modal-copy-button deal-popup-button" id="deal-popup-button">Copy</button>
                    <button type="button" class="btn btn-success  modal-copy-button deal-popup-button" style="display: none" id="deal-popup-copied-button">✓ Copied</button>
                  </div>
                </div>
            </form>
            <div class="input-group mb-3">
              <a id="shop-now" href="" target="_blank" class="btn btn-success mx-auto btn-block" style="background: #41c685;" >Shop Now</a>
            </div>
            <div class="col-12 text-center mb-2 ">
                <span>Help us improve this listing</span>
            </div>
            <div class="col-12 text-center" id="code-work">
                <h5 class="mt-2">Did this code work?</h5>
                <div class="row">
                    <div class="col-6 p-4" class="thumbs-up">
                       
                       <a href="javascript:void(0)" class="code-work-thumb" status="1"><i class="fa fa-thumbs-up" id="icon-thumbs-up" aria-hidden="true"></i></a><br>
                        <span class="code-work-span">Yes</span>
                        
                    </div>
                    
                    <div class="col-6  p-4" class="thumbs-down">
                        <a href="javascript:void(0)" class="code-work-thumb-down"><i class="fa fa-thumbs-down" id="icon-thumbs-down" aria-hidden="true"></i></a><br>
                        <span class="code-work-span">No</span>
                        </a
                    </div>
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    </div>       
<!-----------------footer---------------->
<div class="row footer pt-4">
    <div class="container pt-4">
	    <div class="row">
		    <div class="col-md-3 col-xs-12">
		    	
			    <img src="<?php echo e($assets_front); ?>/assets/images/dealrated-logo3.png" />
				<p>Finding you  the top rated coupon codes, promos and discounts to save money when shopping online.</p>
				<ul class="social-icons p-0">
				    <!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
				    <li><a href="https://twitter.com/DealRated"><i class="fa fa-twitter"></i></a></li>
				    <li><a href="https://www.instagram.com/dealrated/"><i class="fa fa-instagram"></i></a></li>
				    <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
				    <!--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>-->
				    <!--<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>-->
				</ul>
			</div>
			<div class="col-md-2 col-xs-12"></div>
		    <div class="col-md-3 col-xs-12">
			   <h5 class="mb-4 mt-4"><b>TOP CATEGORIES</b></h5>
			   <ul class="p-0" id="footer-cat">
			   	<?php $__currentLoopData = $topcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <li><a href="<?php echo e(url('category/'.$category->slug)); ?>"><?php echo e($category->category_name); ?></a></li>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			   </ul>
			   
			</div>
			<div class="col-md-1 col-xs-12"></div>
		    <div class="col-md-3 col-xs-12">
			    <h5 class="mb-4 mt-4"><b>CONTACT</b></h5>
				<div class="footer-text">
					Dealrated.com<br>
					<a href="#">hello@dealrated.com</a>
                </div>
			</div>
		</div>
		<div class="row footer_bottom mt-4 pt-4 pb-3">
		    <div class="col-md-6 col-xs-12 p-0">
			     <p>© 2020 Dealrated. All rights reserved</p>
			</div>
			<div class="col-md-6 col-xs-12 p-0 text-right">
			    <ul class="p-0">
				    <li><a href="<?php echo e(url('about')); ?>">About Dealrated</a></li>
				    <li><a href="<?php echo e(url('privacy')); ?>">Privacy policy</a></li>
				    <li><a href="<?php echo e(url('terms')); ?>">Terms and conditions</a></li>
				</ul>
			</div>
		</div>
	</div>
</div><?php /**PATH E:\xampp\htdocs\dealrated.com\framework\resources\views/front_layout/footer.blade.php ENDPATH**/ ?>