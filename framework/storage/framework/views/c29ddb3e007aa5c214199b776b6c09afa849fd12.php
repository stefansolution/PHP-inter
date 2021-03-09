
<!DOCTYPE html>
<html lang="en">
	<head>
	    
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?php echo e(url('/framework/public/')); ?>/assets/images/dealrated-fav-ico.png" type="image/x-icon">
        <link rel="icon" sizes="16x16 32x32 64x64" href="<?php echo e(url('/framework/public/')); ?>/images/dealrated-fav-ico.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo e(url('/framework/public/')); ?>/assets/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo e(url('/framework/public/')); ?>/assets/js/jquery-3.4.1.min.js"></script>
        
        <script src="<?php echo e(url('/framework/public/')); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script asyn src="<?php echo e(url('/framework/public/')); ?>/assets/js/custom.js"></script>
        <link rel="stylesheet" href="<?php echo e(url('/framework/public/')); ?>/assets/font-awesome/css/font-awesome.min.css">
        <link href="<?php echo e(url('/framework/public/')); ?>/assets/css/style.css" rel="stylesheet" />

	</head>
	<body>
		 

    <!-----------------------header------------------------->
<div class="container">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	  <a class="navbar-brand" href="https://dealrated.com"><img src="https://dealrated.com/framework/public/assets/images/dealrated-logo2.jpg" ></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      
            <form action="https://dealrated.com/searchCouponDeal" class="navbar-form navbar-center" id="searchCouponDeal" method="get">
                <div class="input-group mb-3 error-show ui-widget">
                    <input id="search" name="q" class="form-control" placeholder="Search Coupons & Deals" value="" >
                    <div class="input-group-append searchCoupon">
                      <span type="submit" class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>
                </div>
            </form>
        
	      
	      
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">CATEGORIES</a>
			<ul class="dropdown-menu multi-column columns-3 pt-0">
	            <div class="row">
	                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/accessories">Accessories</a></li>
                		                         		        <li><a href="https://dealrated.com/category/apparel">Apparel</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/apps">Apps</a></li>
                		                         		        <li><a href="https://dealrated.com/category/beauty">Beauty</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/clothing">Clothing</a></li>
                		                         		        <li><a href="https://dealrated.com/category/contacts">Contacts</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/cosmetics">Cosmetics</a></li>
                		                         		        <li><a href="https://dealrated.com/category/delivery">Delivery</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/fashion">Fashion</a></li>
                		                         		        <li><a href="https://dealrated.com/category/fitness">Fitness</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/food">Food</a></li>
                		                         		        <li><a href="https://dealrated.com/category/gifts">Gifts</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/grooming">Grooming</a></li>
                		                         		        <li><a href="https://dealrated.com/category/gym-gear">Gym Gear</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/hair-care">Hair Care</a></li>
                		                         		        <li><a href="https://dealrated.com/category/health">Health</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/jeans">Jeans</a></li>
                		                         		        <li><a href="https://dealrated.com/category/kids">Kids</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/leggings">Leggings</a></li>
                		                         		        <li><a href="https://dealrated.com/category/nails">Nails</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/nutrition">Nutrition</a></li>
                		                         		        <li><a href="https://dealrated.com/category/optical">Optical</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/organic">Organic</a></li>
                		                         		        <li><a href="https://dealrated.com/category/protein">Protein</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/skin-care">Skin Care</a></li>
                		                         		        <li><a href="https://dealrated.com/category/sports">Sports</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/stationery">Stationery</a></li>
                		                         		        <li><a href="https://dealrated.com/category/sunglasses">Sunglasses</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/supplements">Supplements</a></li>
                		                         		        <li><a href="https://dealrated.com/category/vegan">Vegan</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/vitamins">Vitamins</a></li>
                		                         		        <li><a href="https://dealrated.com/category/watches">Watches</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/hair">Hair</a></li>
                		                         		        <li><a href="https://dealrated.com/category/makeup">Makeup</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/shoes">Shoes</a></li>
                		                         		        <li><a href="https://dealrated.com/category/homewares">Homewares</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/activewear">Activewear</a></li>
                		                         		        <li><a href="https://dealrated.com/category/jewelry">Jewelry</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/baby">Baby</a></li>
                		                         		        <li><a href="https://dealrated.com/category/vaping">Vaping</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/outdoors">Outdoors</a></li>
                		                         		        <li><a href="https://dealrated.com/category/furniture">Furniture</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/art">Art</a></li>
                		                         		        <li><a href="https://dealrated.com/category/bags">Bags</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/automotive">Automotive</a></li>
                		                         		        <li><a href="https://dealrated.com/category/equipment">Equipment</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/footwear">Footwear</a></li>
                		                         		        <li><a href="https://dealrated.com/category/auto-accessories">Auto accessories</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/streetwear">Streetwear</a></li>
                		                         		        <li><a href="https://dealrated.com/category/hair-extensions">Hair extensions</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/subscriptions">Subscriptions</a></li>
                		                         		        <li><a href="https://dealrated.com/category/events">Events</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/skate">Skate</a></li>
                		                         		        <li><a href="https://dealrated.com/category/detox">Detox</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/swimwear">Swimwear</a></li>
                		                         		        <li><a href="https://dealrated.com/category/bracelets">Bracelets</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/merchandise">Merchandise</a></li>
                		                         		        <li><a href="https://dealrated.com/category/training">Training</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/craft">Craft</a></li>
                		                         		        <li><a href="https://dealrated.com/category/electronics">Electronics</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/toys">Toys</a></li>
                		                         		        <li><a href="https://dealrated.com/category/skateboards">Skateboards</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/hats">Hats</a></li>
                		                         		        <li><a href="https://dealrated.com/category/firearms">Firearms</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/books">Books</a></li>
                		                         		        <li><a href="https://dealrated.com/category/lighting">Lighting</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/phone-cases">Phone cases</a></li>
                		                         		        <li><a href="https://dealrated.com/category/mens">Mens</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/australia">Australia</a></li>
                		                         		        <li><a href="https://dealrated.com/category/leather">Leather</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/entertainment">Entertainment</a></li>
                		                         		        <li><a href="https://dealrated.com/category/womens">Womens</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/pets">Pets</a></li>
                		                         		        <li><a href="https://dealrated.com/category/plants">Plants</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/handmade">Handmade</a></li>
                		                         		        <li><a href="https://dealrated.com/category/vintage">Vintage</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/medical">Medical</a></li>
                		                         		        <li><a href="https://dealrated.com/category/candles">Candles</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/drinks">Drinks</a></li>
                		                         		        <li><a href="https://dealrated.com/category/classes">Classes</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/bikinis">Bikinis</a></li>
                		                         		        <li><a href="https://dealrated.com/category/lashes">Lashes</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/auto-parts">Auto parts</a></li>
                		                         		        <li><a href="https://dealrated.com/category/activities">Activities</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/gaming">Gaming</a></li>
                		                         		        <li><a href="https://dealrated.com/category/hoodies">Hoodies</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/snacks">Snacks</a></li>
                		                         		        <li><a href="https://dealrated.com/category/travel">Travel</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/perfume">Perfume</a></li>
                		                         		        <li><a href="https://dealrated.com/category/wallets">Wallets</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/services">Services</a></li>
                		                         		        <li><a href="https://dealrated.com/category/shampoo">Shampoo</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/cooking">Cooking</a></li>
                		                         		        <li><a href="https://dealrated.com/category/underwear">Underwear</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/kitchenware">Kitchenware</a></li>
                		                         		        <li><a href="https://dealrated.com/category/kitchen">Kitchen</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/camping">Camping</a></li>
                		                         		        <li><a href="https://dealrated.com/category/equestrian">Equestrian</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/therapy">Therapy</a></li>
                		                         		        <li><a href="https://dealrated.com/category/coffee">Coffee</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/t-shirts">T shirts</a></li>
                		                         		        <li><a href="https://dealrated.com/category/creative">creative</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/motorsport">motorsport</a></li>
                		                         		        <li><a href="https://dealrated.com/category/stickers">stickers</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/socks">socks</a></li>
                		                         		        <li><a href="https://dealrated.com/category/cleaning-chemicals">cleaning chemicals</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/yoga">yoga</a></li>
                		                         		        <li><a href="https://dealrated.com/category/photography">photography</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/jewellery">jewellery</a></li>
                		                         		        <li><a href="https://dealrated.com/category/necklaces">necklaces</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/water-bottles">water bottles</a></li>
                		                         		        <li><a href="https://dealrated.com/category/dogs">dogs</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/storage">storage</a></li>
                		                         		        <li><a href="https://dealrated.com/category/bedding">bedding</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/juice">juice</a></li>
                		                         		        <li><a href="https://dealrated.com/category/body-care">body care</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/lipstick">lipstick</a></li>
                		                         		        <li><a href="https://dealrated.com/category/backpacks">backpacks</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/music">music</a></li>
                		                         		        <li><a href="https://dealrated.com/category/chocolate">chocolate</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/military">military</a></li>
                		                         		        <li><a href="https://dealrated.com/category/guns">guns</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/prints">prints</a></li>
                		                         		        <li><a href="https://dealrated.com/category/pizza">pizza</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/transport">transport</a></li>
                		                         		        <li><a href="https://dealrated.com/category/wholesale">wholesale</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/football">football</a></li>
                		                         		        <li><a href="https://dealrated.com/category/wigs">wigs</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/aromatherapy">aromatherapy</a></li>
                		                         		        <li><a href="https://dealrated.com/category/lingerie">lingerie</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/decor">decor</a></li>
                		                         		        <li><a href="https://dealrated.com/category/adult">adult</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/flowers">flowers</a></li>
                		                         		        <li><a href="https://dealrated.com/category/fragrance">fragrance</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/bridal">bridal</a></li>
                		                         		        <li><a href="https://dealrated.com/category/tea">tea</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/golf">golf</a></li>
                		                         		        <li><a href="https://dealrated.com/category/bicycle">bicycle</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/restaurants">restaurants</a></li>
                		                         		        <li><a href="https://dealrated.com/category/airsoft">airsoft</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/meal-prep">meal prep</a></li>
                		                         		        <li><a href="https://dealrated.com/category/weight-loss">weight loss</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/magazines">magazines</a></li>
                		                         		        <li><a href="https://dealrated.com/category/hair-products">hair products</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/pillows">pillows</a></li>
                		                         		        <li><a href="https://dealrated.com/category/denim">denim</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/wine">wine</a></li>
                		                         		        <li><a href="https://dealrated.com/category/video">video</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/contact-lenses">contact lenses</a></li>
                		                         		        <li><a href="https://dealrated.com/category/fishing">fishing</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/anime">anime</a></li>
                		                         		        <li><a href="https://dealrated.com/category/knitting">knitting</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/plus-size">plus size</a></li>
                		                         		        <li><a href="https://dealrated.com/category/cards">cards</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/slime">slime</a></li>
                		                         		        <li><a href="https://dealrated.com/category/accommodation">accommodation</a></li>
                		                         		    </ul>
                		</div>
                                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	                		        <li><a href="https://dealrated.com/category/dresses">dresses</a></li>
                		                         		        <li><a href="https://dealrated.com/category/crystals">crystals</a></li>
                		                         		    </ul>
                		</div>
                	            </div>
	        </ul>
		 </li>
		  <!-- <li class="nav-item">
			<a class="nav-link" href="#">SUBMIT COUPONS</a>
		  </li> -->
		  <li class="nav-item">
			<a class="nav-link" href="https://dealrated.com/about">ABOUT</a>
		  </li>    
		</ul>
	  </div>  
	</nav>
</div>

<!------------------end header------------------->
<hr>        
    <div class="container content text-center text-uppercase pt-3 pb-3">
      <!--<p>DEALRATED HELPS SHOPPERS TO FIND SAVINGS AT ALMOST ANY STORE ONLINE.</p>-->
      
    </div>
    <!--------------end section-------------->

    <!---------------------about------------->
   <!-- <div class="row about_sec pt-4">
      <div class="container pt-4 mt-3 mb-4 pb-4">
         <h3 class="mb-3 text-center"><b>Invaild Store</b></h3>
      </div>
    </div>-->
    <!----------------end about------------------>
    <!---------------------testimonial--------------->
    <div class="row testimonial pt-4 pb-4">
        <div class="container pt-3 pb-4 mb-4">
          <h4 class="text-center mb-4 pb-4">404 | Not Found.</h4>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header-deal">
          <div class="coupon-info-container">
           <img class="coupon-logo rounded-circle"  src="https://dealrated.com/framework/public/assets/images/wow.png">
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
		    	
			    <img src="https://dealrated.com/framework/public/assets/images/dealrated-logo3.png" />
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
			   				        <li><a href="https://dealrated.com/category/accessories">Accessories</a></li>
			    			        <li><a href="https://dealrated.com/category/food">Food</a></li>
			    			        <li><a href="https://dealrated.com/category/fashion">Fashion</a></li>
			    			        <li><a href="https://dealrated.com/category/beauty">Beauty</a></li>
			    			        <li><a href="https://dealrated.com/category/clothing">Clothing</a></li>
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
				    <li><a href="https://dealrated.com/about">About Dealrated</a></li>
				    <li><a href="https://dealrated.com/privacy">Privacy policy</a></li>
				    <li><a href="https://dealrated.com/terms">Terms and conditions</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
 

	</body>
</html>
<?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/errors/404.blade.php ENDPATH**/ ?>