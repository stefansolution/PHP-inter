<!DOCTYPE html>
<html lang="en">
	<head>
	     @if($title!='')
        <title>{{$title}}</title>
        @else
        <title>DealRated.com - Coupons, Discounts and Coupon Codes</title>
        @endif
        @if($description!='')
        <meta name="description" content="{{$description}}">
        @endif
        @if($meta_url)
        <meta property="og:url" content="{{$meta_url}}">
        @endif
        @if($meta_title!='')
        <meta property="og:title" content="{{$meta_title}}" />
        @endif
        @if($meta_description!='')
        <meta property="og:description" content="{{$meta_description}}" />
        @endif
        @if($meta_image!='')
        <meta property="og:image" content="{{$meta_image}}">
        @endif
        @if($base_url)
        <link rel="canonical" href="{{$base_url}}">
        @endif
        
         @if($schemaQues!='')
        <script data-react-helmet="true" type="application/ld+json">
    	  {
    	    "@context": "https://schema.org/",
    	    "@type": "FAQPage",
    	    "mainEntity":{!! $schemaQues !!}
    	  }
    	</script>
          @endif 
	    
	    
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{$assets_front}}/assets/images/dealrated-fav-ico.png" type="image/x-icon">
        <link rel="icon" sizes="16x16 32x32 64x64" href="{{$assets_front}}/assets/images/dealrated-fav-ico.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{$assets_front}}/assets/bootstrap/css/bootstrap.min.css">
        <script src="{{$assets_front}}/assets/js/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('admin-assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{$assets_front}}/assets/bootstrap/js/bootstrap.min.js"></script>
        <script asyn src="{{$assets_front}}/assets/js/custom.js"></script>
        <link rel="stylesheet" href="{{$assets_front}}/assets/font-awesome/css/font-awesome.min.css">
        <link href="{{$assets_front}}/assets/css/style.css" rel="stylesheet" />

	  <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92545444-2
        "></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-92545444-2');
        </script>
        
	</head>
	<body>
		@yield('content') 

	</body>
</html>
