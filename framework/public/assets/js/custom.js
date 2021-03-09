var apiBaseUrl = 'https://dealrated.com/api';
var baseUrl ='https://dealrated.com';

$(document).ready(function(){
    
    var href=window.location.href;
    
    setTimeout(function(){
        $(".alert.alert-success").hide();
    }, 2000);
    
    setTimeout(()=>{
        $("img[data-src]").each(function(){
    		$(this).attr('src',$(this).attr('data-src'));
    	});
    	
    	if((href.indexOf('store') >= 0)){
    	    var pathname = window.location.pathname;
    	     pathnameArray=pathname.split("/");
    	    var slug=pathnameArray[pathnameArray.length-1];
    	    
    	    $.ajax({
    	        type: 'get',
    	        url: baseUrl+'/getExpiredCoupon/'+slug,
    	        success: function(response){
    	           $('.expired-coupon').html(response);
    	              
    	        },error: function(jqXHR, textStatus) {
    	           console.warn(textStatus);
    	        },
    	    });
    	    
    	    setTimeout(()=>{
        	    $.ajax({
                    type: 'get',
                    url: baseUrl+'/getRelatedStore/'+slug,
                    success: function(response){
                        $('.related-store-container').html(response);
                    },error: function(jqXHR, textStatus) {
                       console.warn(textStatus);
                    },
                });
                
                setTimeout(()=>{
                    $.ajax({
            	        type: 'get',
            	        url: baseUrl+'/getPopularRelatedStore/'+slug,
            	        success: function(response){
            	            $('.popular-related-store-container').html(response);
            	              
            	        },error: function(jqXHR, textStatus) {
            	           console.warn(textStatus);
            	        },
            	    });
    	        },1000);
    	        
    	    },1000);
    	}   
        if((href.indexOf('category')>=0)){
    	    var pathname = window.location.pathname;
    	     pathnameArray=pathname.split("/");
    	    var slug=pathnameArray[pathnameArray.length-1];
    	    $.ajax({
    	        type: 'get',
    	        url: baseUrl+'/getCategoryRelatedStore/'+slug,
    	        success: function(response){
    	            $('.category-store-container').html(response);
    	              
    	        },error: function(jqXHR, textStatus) {
    	           console.warn(textStatus);
    	        },
    	    });

        }
    },3000);
  
    var availableTags = [];
    
	$('.nav-link').click(function(){
		$('.nav-link').removeClass('active');   
		$(this).addClass('active');
	});
	
	$('.copy-copon').on('click',function(){
		$('#deal-popup-copied-button').hide();
        $('#deal-popup-button').show();  
		$container = $(this).closest('.coupon-list-row');
		var index=$container.attr('index');
		var logo = $container.find('.coupon-logo').attr("src");
		var heading = $.trim($container.find('.coupon-heading').text());
		var line = $.trim($container.find('.coupon-line-1').text());
		var domainstrn = $.trim($container.find('.coupon-domain').text());
		domainArray=domainstrn.split(" ");
	    var domain=domainArray[1];

		var code=$(this).attr('coupon');
		var store_slug=$(this).attr('store-slug');
		var coupon_id=$container.attr('CouponId');
		var pathname = window.location.pathname;
	    var url      = window.location.href;     
        var origin   = window.location.origin;
		var completeurl=origin+'/store/'+store_slug+'#c='+coupon_id;
		location.replace(completeurl);
	})

	if((window.location.href.indexOf('#c=') >= 0)){
	    var url=window.location.href;
        setTimeout(()=>{	    
            urlArray=url.split("=");
            var CouponId=urlArray[1];
            $container=$('div[couponid="'+CouponId+'"]');
            if($container!=""){
                var index=$container.attr('index');
                if(index!=undefined){
                    $('#code-work').prev().show();
                    $('#code-work').show();
                    $('#myModal').modal({
                        show: true,
                        backdrop:'static'
                    });
            	    var index=$container.attr('index');
            		var logo = $container.find('.coupon-logo').attr("data-src");
            		var heading = $.trim($container.find('.coupon-heading').text());
            		var line = $.trim($container.find('.coupon-line-1').text());
            		var domainstrn = $.trim($container.find('.coupon-domain').text());
                    domainArray=domainstrn.split(" ");
                    var domain=domainArray[1];
                    var code = '';
                    if($container.find('.store-copy-copon').attr('coupon')){
                        code=$container.find('.store-copy-copon').attr('coupon');
                    }else{
                        code=$container.find('.reveal-copy-code').attr('coupon');
                    }
            	    $('#deal-popup-button').attr('index',index);
            		$('.coupon-logo').attr('src',logo);
            		$('#coupon-heading').text(heading);
            		$('#coupon-line-1').text(line);
            		$('#coupon-line-2').text(domainstrn);
            		$('#deal-popup-code').val(code).css("text-align","center");
            		var storedomain= 'https://www.'+domain;
            		$('#shop-now').attr('href',storedomain);
            		$.ajax({
                        type: 'get',
                        url: apiBaseUrl+'/updateCouponLastUsed/'+index,
                        dataType: 'json',
                        success: function(response){
                            if(response.status==200){
                               coupon_used =response.coupondetails.coupon_used;
                               
                               $container=$('div[couponid="'+CouponId+'"]');
                               $container.find('.coupon_used').text(coupon_used);
                            }
                            
                        },error: function(jqXHR, textStatus) {
                           console.warn(textStatus);
                        },
                    }); 
                }
            }
         },1000); 
	}
	
	$(document).on('click','.store-copy-copon',function(){
	    $container = $(this).closest('.coupon-list-row');
		store_slug = $(this).attr('store-slug');
		
		 $special_url = $container.find('.coupon-store').attr('special-url');
		 console.log($special_url);
		 
	    var domainstrn = $.trim($container.find('.coupon-domain').text());
	    domainArray = domainstrn.split(" ");
	    var domain = domainArray[1];
	    coupon_id = $container.attr('CouponId');
	    var pathname = window.location.pathname;
	    var url      = window.location.href;     
        var origin   = window.location.origin;
       	var completeurl=origin+'/store/'+store_slug+'#c='+coupon_id;
        if((window.location.href.indexOf('#c=') < 0 )){
            window.open(completeurl, "_blank");
           
           	$('#myModal').modal({
                show: true,
                backdrop:'static'
            });
           	url = window.location.href;    
    	    urlArray = url.split("=");
    	    var CouponId = urlArray[1];
    	    $container=$('div[couponid="'+CouponId+'"]');
    	    if($container != ""){
    	        $('#code-work').prev().show();
    	        $('#code-work').show();
    	        $('#myModal').modal({
                    show: true,
                    backdrop:'static'
                });
        	    var index = $container.attr('index');
        		var logo = $container.find('.coupon-logo').attr("data-src");
        		var heading = $.trim($container.find('.coupon-heading').text());
        		var line = $.trim($container.find('.coupon-line-1').text());
        		var domainstrn = $.trim($container.find('.coupon-domain').text());
        		var code=$container.find('.store-copy-copon').attr('coupon');
        	    $('#deal-popup-button').attr('index',index);
        		$('.coupon-logo').attr('src',logo);
        		$('#coupon-heading').text(heading);
        		$('#coupon-line-1').text(line);
        		$('#coupon-line-2').text(domainstrn);
        		$('#deal-popup-code').val(code).css("text-align","center");
        		var storedomain= 'https://www.'+domain;
        		$('#shop-now').attr('href',storedomain);
        		
        		$.ajax({
                    type: 'get',
                    url: apiBaseUrl+'/updateCouponLastUsed/'+index,
                    dataType: 'json',
                    success: function(response){
                       
                        if(response.status==200){
                           coupon_used =response.coupondetails.coupon_used;
                           
                           $container=$('div[couponid="'+CouponId+'"]');
                           $container.find('.coupon_used').text(coupon_used);
                        }
                        
                    },error: function(jqXHR, textStatus) {
                       console.warn(textStatus);
                    },
                });
            }
            
            if($special_url){
                 $(location).attr('href',$special_url);
            }else{
                $(location).attr('href','https://www.'+domain);
            }
	    }else if((window.location.href.indexOf('#c=') > 0 )){
	        
	        $(location).attr('href',completeurl);
           
           	$('#myModal').modal({
                show: true,
                backdrop:'static'
            });
           
           	url = window.location.href;    
    	    urlArray=url.split("=");
    	    var CouponId=urlArray[1];
    	    $container=$('div[couponid="'+CouponId+'"]');
    	    if($container != ""){
    	        $('#code-work').prev().show();
    	        $('#code-work').show();
    	        $('#myModal').modal({
                    show: true,
                    backdrop:'static'
                });
        	    var index=$container.attr('index');
        		var logo = $container.find('.coupon-logo').attr("data-src");
        		var heading = $.trim($container.find('.coupon-heading').text());
        		var line = $.trim($container.find('.coupon-line-1').text());
        		var domainstrn = $.trim($container.find('.coupon-domain').text());
        		var code=$container.find('.store-copy-copon').attr('coupon');
        	    $('#deal-popup-button').attr('index',index);
        		$('.coupon-logo').attr('src',logo);
        		$('#coupon-heading').text(heading);
        		$('#coupon-line-1').text(line);
        		$('#coupon-line-2').text(domainstrn);
        		$('#deal-popup-code').val(code).css("text-align","center");
        		var storedomain= 'https://www.'+domain;
        		$('#shop-now').attr('href',storedomain);
        		$.ajax({
                    type: 'get',
                    url: apiBaseUrl+'/updateCouponLastUsed/'+index,
                    dataType: 'json',
                    success: function(response){
                       
                        if(response.status==200){
                           coupon_used =response.coupondetails.coupon_used;
                           
                           $container=$('div[couponid="'+CouponId+'"]');
                           $container.find('.coupon_used').text(coupon_used);
                        }
                        
                    },error: function(jqXHR, textStatus) {
                       console.warn(textStatus);
                    },
                });
            }
	    }
	})
	
	$(document).on('click','.reveal-copy-code',function(){
	     $container = $(this).closest('.coupon-list-row');
	     var domainstrn = $.trim($container.find('.coupon-domain').text());
	     domainArray=domainstrn.split(" ");
	     var domain=domainArray[1];
	     var coupon_id=$container.attr('couponid');
	     var store_slug=$(this).attr('store-slug');
	     var origin   = window.location.origin;
         var completeurl=origin+'/store/'+store_slug+'#c='+coupon_id;
         $(location).attr('href',completeurl);
           	/*---------modal-------*/
       	$('#myModal').modal({
            show: true,
            backdrop:'static'
        });
        
        url = window.location.href;    
	    urlArray=url.split("=");
	    var CouponId=urlArray[1];
	    $container=$('div[couponid="'+CouponId+'"]');
	    if($container != ""){
	        $('#code-work').prev().show();
	        $('#code-work').show();
	        $('#myModal').modal({
                show: true,
                backdrop:'static'
            });
    	    var index=$container.attr('index');
    		var logo = $container.find('.coupon-logo').attr("data-src");
    		var heading = $.trim($container.find('.coupon-heading').text());
    		var line = $.trim($container.find('.coupon-line-1').text());
    		var domainstrn = $.trim($container.find('.coupon-domain').text());
    		var code=$container.find('.reveal-copy-code').attr('coupon');
    	    $('#deal-popup-button').attr('index',index);
    		$('.coupon-logo').attr('src',logo);
    		$('#coupon-heading').text(heading);
    		$('#coupon-line-1').text(line);
    		$('#coupon-line-2').text(domainstrn);
    		$('#deal-popup-code').val(code).css("text-align","center");
    		var storedomain= 'https://www.'+domain;
    		$('#shop-now').attr('href',storedomain);
    		$.ajax({
                type: 'get',
                url: apiBaseUrl+'/updateCouponLastUsed/'+index,
                dataType: 'json',
                success: function(response){
                   
                    if(response.status==200){
                       coupon_used =response.coupondetails.coupon_used;
                       
                       $container=$('div[couponid="'+CouponId+'"]');
                       $container.find('.coupon_used').text(coupon_used);
                    }
                    
                },error: function(jqXHR, textStatus) {
                   console.warn(textStatus);
                },
            });
        }
	    
	})
	
    $(document).on('click','.coupon-store',function(){
        completeurl = $(this).attr('href');
        $container = $(this).closest('.coupon-list-row');
        $(location).attr('href',completeurl);
        $('#myModal').modal({
                show: true,
                backdrop:'static'
            });
    
       	url      = window.location.href;    
	    urlArray=url.split("=");
	    var CouponId=urlArray[1];
	    $container=$('div[couponid="'+CouponId+'"]');
	    if($container != ""){
    	        $('#code-work').prev().show();
    	        $('#code-work').show();
    	        $('#myModal').modal({
                    show: true,
                    backdrop:'static'
                });
        	    
        	    var index=$container.attr('index');
        	   
        		var logo = $container.find('.coupon-logo').attr("src");
        		var heading = $.trim($container.find('.coupon-heading').text());
        		var line = $.trim($container.find('.coupon-line-1').text());
        		var domainstrn = $.trim($container.find('.coupon-domain').text());
        		var code ='';
    			if($container.find('.store-copy-copon').attr('coupon')){
    			    code = $container.find('.store-copy-copon').attr('coupon');
    			}else{
    			    code = $container.find('.reveal-copy-code').attr('coupon');
    			}
        	    $('#deal-popup-button').attr('index',index);
        		$('.coupon-logo').attr('src',logo);
        		$('#coupon-heading').text(heading);
        		$('#coupon-line-1').text(line);
        		$('#coupon-line-2').text(domainstrn);
        		$('#deal-popup-code').val(code).css("text-align","center");
        		
        		$.ajax({
                    type: 'get',
                    url: apiBaseUrl+'/updateCouponLastUsed/'+index,
                    dataType: 'json',
                    success: function(response){
                        if(response.status==200){
                           coupon_used =response.coupondetails.coupon_used;
                           
                           $container=$('div[couponid="'+CouponId+'"]');
                           $container.find('.coupon_used').text(coupon_used);
                        }
                        
                    },error: function(jqXHR, textStatus) {
                       console.warn(textStatus);
                    },
                });
            }
    })
	
	$('.code-work-thumb').on('click',function(){
	    var id=$('#deal-popup-button').attr('index');
	    var status=$(this).attr('status');
	    if(status){
	        $.ajax({
                type: 'POST',
                url: apiBaseUrl+'/couponLikeCounter/'+id,
                data: {is_like:status},
                dataType: 'json',
                success: function(response){
                    if(response.status==200){
                        $('#code-work').prev().hide();
                        $('#code-work').hide();
                    }else{
                    	$('.alert-danger').find('p').text(response.message);
                    }
                },error: function(jqXHR, textStatus) {
                   console.warn(textStatus);
                },
            });
	    }
	})
	
	$('.code-work-thumb-down').on('click',function(){
	    $('#code-work').prev().hide();
	    $('#code-work').hide();
	})
	
	$('.model-close').on('click',function(){
        $('#myModal').modal('hide');
        $('.store-copy-copon').each(function () {
            var tmp = `<span>Copy code</span><span>`+$(this).attr("coupon")+`</span>`;
            $(this).html(tmp);
        })
	});
	
	$("input[name='q']").on('blur',function(){
		$('#q-error').text('');
		$('#subscribe-error').text('');
	})

	$('.deal-popup-button').on('click',function(){
		var couponId=$(this).attr('index');
		$('#deal-popup-button').hide();
		$('#deal-popup-copied-button').show();
		var coupon =$('#deal-popup-code').val();
	    var $temp = $("<input>");
	    $("body").append($temp);
	    $temp.val(coupon).select();
	    document.execCommand("copy");
	    $temp.remove();
	    setTimeout(function(){
            $('#deal-popup-copied-button').hide();
            $('#deal-popup-button').show();
        }, 3000);
	})

	$("#subscribe-form").validate({
		rules: {
			q: {
				required: true,
				email:true
			}
		},
		  messages: {
			q: {
			  required: "Email is required.",
			  email:"Email format"
			}
		  },
		   errorPlacement: function(error, element) {
            error.insertAfter($(element).next().next());
        },
		submitHandler: function() {            
			subscribe();
            return false;
		}
	});
	
    $('.searchCoupon').on('click',function(){
        $('#searchCouponDeal').submit();
    });
	
	$('.store-domain').on('click',function(){
	    var special_url = $(this).attr('special-url');
	    if(special_url){
	        window.open(special_url, "_blank");
	    }else{
	        var domain=$(this).parent().find('.coupon-domain').text();
    	    var completeurl="https://www."+domain;
    	    window.open(completeurl, "_blank");
	    }
	    
	})

});

function subscribe(){
	email=$('#subscribe').val();
	storeId=$('#subscribe').attr('index');
	storeName=$.trim($('#subscribe').attr('store'));
	$.ajax({
        type: 'post',
        url: apiBaseUrl+'/subscribe',
        data:{storeId:storeId,email:email,store:storeName},
        dataType: 'json',
        success: function(response){
            if(response.status==200){
            	$('.subscribe-success').text(response.message);
            	setTimeout(function(){
        		    $('.subscribe-success').text(''); 
                 }, 3000);
            }  
        },error: function(jqXHR, textStatus) {
           console.warn(textStatus);
        },
    });
}

function abortPrevRequests(calls){
	calls.forEach(function(r){
		r.abort();
	});
}


