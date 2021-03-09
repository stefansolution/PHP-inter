var apiBaseUrl = 'https://dealrated.com/api';
var baseUrl ='https://dealrated.com';
var storeRequests = [];
$( document ).ready(function() { 
	
    $(".zoom").hover(function(){
		$(this).addClass('transition');
	}, function(){
		$(this).removeClass('transition');
	});
	
	$('select').selectpicker();
    
	$('#back-user-list').on('click',function(){
        window.history.back();
    });
    
    setTimeout(function(){
		$(".alert.alert-success").hide();
	}, 2000);

	setTimeout(function(){
		$(".alert.alert-danger").hide();
	}, 2000);
	
    $('#store').on('keyup',function(){
        store=$(this).val();
        abortPrevRequests(storeRequests);
        $('.suggestion-container').html('').hide();
        requestObj = $.ajax({
                    type: 'get',
                    url: baseUrl+'/getStoreSuggestion/'+store,
                    success: function(response){
                        var suggestion='';
                        if(response.status == 200){
							response.stores.forEach(function (result,item) {
							    console.log(result);
							    
							   suggestion +=`<li store-id="`+result.id+`" class="suggest_store" >`+result.store_name+`</li>`
							});
							$('.suggestion-container').html(suggestion).show();
						}
                       
                    },error: function(jqXHR, textStatus) {
                       console.warn(textStatus);
                    },
                });
        storeRequests.push(requestObj);
    })
    
    
    $(document).on('click','.suggest_store',function(){
        $('#store').val($(this).text());
        $('#storeId').val($(this).attr('store-id'));
        $('.suggestion-container').hide();
    });
    
    $('.addStoreField').on('keyup',function(){
        $('#storeId').val('');
    });
    
    
    $("#add-coupon-form").validate({
		rules: {
			store_name: {
				required: true
			},
			code: {
				required: true
			},
			coupon_off: {
				required: true
			},
			Status: {
				required: true
			}
		},
		  messages: {
			store_name: {
			  required: "Store Name is required."
			},
			code: {
			  required: "Code is required."
			},
			coupon_off: {
			  required: "Coupon off is required."
			},
			status: {
			  required: "Status is required."
			}
		  },
		
		submitHandler: function() { 
			return true;
		}
	});
	
	$("#edit-coupon-form").validate({
		rules: {
			store_name: {
				required: true
			},
			code: {
				required: true
			},
			coupon_off: {
				required: true
			},
			Status: {
				required: true
			}
		},
		  messages: {
			store_name: {
			  required: "Store Name is required."
			},
			code: {
			  required: "Code is required."
			},
			coupon_off: {
			  required: "Coupon off is required."
			},
			status: {
			  required: "Status is required."
			}
		  },
		
		submitHandler: function() { 
			return true;
		}
	});

    $("#admin-change-password").validate({
		rules: {
			password: {
				required: true,
				minlength:6,
				maxlength:15
			},
			confirmpassword:{
				required: true,
				minlength:6,
				maxlength:15,
				equalTo: "#admin-password"
			}
		},
		  messages: {
		   
			confirmpassword: {
			  required: "Confirm Password is required.",
			  equalTo: "Password is not matched."
			}
		  },
		
		submitHandler: function() {            
			return true;
		}
	});

    $("#profile-admin-edit").validate({
        rules: {
            email:{
                required: true,
                email:true,
                    remote: {
	                    type: 'GET',
	                    url: apiBaseUrl+'/validateAdminEmailCheck?id='+$('#admin-id').val(),
	                    dataType: 'json'
	                }
            }
        },
          messages: {
            email: {
              required: "Email is required.",
              remote: "Email already registered.",
            }
          }
		
    });
    
    $("#add-category-form").validate({
		rules: {
			category_name: {
				required: true
			},
			status: {
				required: true
			}
		},
		  messages: {
			category_name: {
			  required: "Category Name is required."
			},
			status: {
			  required: "Status is required."
			}
		  },
		
		submitHandler: function() { 
			return true;
		}
	});

	$("#edit-category-form").validate({
		rules: {
			category_name: {
				required: true
			},
			status: {
				required: true
			}
		},
		  messages: {
			category_name: {
			  required: "Category Name is required."
			},
			status: {
			  required: "Status is required."
			}
		  },
		
		submitHandler: function() {  
			return true;
		}
	});
	
	var getSearchParameter =   getUrlParameter('search');
	if(getSearchParameter != ''){
		$('#search-tab').val(getSearchParameter);
	}
	
	var getSearchCategoryParameter =   getUrlParameter('category');
	if(getSearchCategoryParameter != ''){
		$('#search-category').val(getSearchCategoryParameter);
	}

	var getSearchEmailParameter =   getUrlParameter('email');
	if(getSearchEmailParameter != ''){
		$('#search-email').val(getSearchEmailParameter);
	}
	
	var getSearchExtensionParameter =   getUrlParameter('store');
	if(getSearchExtensionParameter != ''){
		$('#search-store').val(getSearchExtensionParameter);
	}
	
	var getSearchExtensionParameter =   getUrlParameter('q');
	if(getSearchExtensionParameter != ''){
		$('#search-coupon').val(getSearchExtensionParameter);
	}
	
	$('#uploadForm').on('submit', function(e){  
       e.preventDefault();  
       $.ajax({  
            url: apiBaseUrl+'/uploadItemMedia',  
            type: "POST",  
            data: new FormData(this),  
            contentType: false,  
            processData:false,  
            success: function(data)  
            {  
                $("#gallery").html(data);  
            }  
       });  
    }); 

    $("#add-store-form").validate({
		rules: {
			category: {
				required: true
			},store_name: {
				required: true
			},status: {
				required: true
			},domain:{
			    required:true
			},image:{
                required:true
			}
		},
		  messages: {
			category: {
			  required: "Category is required.",
			},store_name: {
			  required: "Store name is required.",
			},status: {
			  required: "Status is required.",
			},domain:{
			    required: "Domain is required.",
			},image:{
                required:"Image is required.",
			}
		  },
		
		submitHandler: function() {  
			return true;
		}
	});

	$("#edit-store-form").validate({
		rules: {
			category: {
				required: true
			},store_name: {
				required: true
			},status: {
				required: true
			},domain:{
			    required:true
			}
		},
		  messages: {
			category: {
			  required: "Category is required.",
			},store_name: {
			  required: "Store name is required.",
			},status: {
			  required: "Status is required.",
			},domain:{
			    required: "Domain is required.",
			}
		  },
		submitHandler: function() {  
			return true;
		}
	});


});	

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1].replace(/[^a-zA-Z ]/g, " "));
        }
    }
};

function abortPrevRequests(calls){
	calls.forEach(function(r){
		r.abort();
	});
}
