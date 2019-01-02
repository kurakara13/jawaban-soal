
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Simple Bank</title>
	<!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
	<![endif]-->


	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="{{asset('vendor/ablepro-lite/assets/images/favicon.png')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('vendor/ablepro-lite/assets/images/favicon.ico')}}" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{asset('vendor/ablepro-lite/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/icon/icofont/css/icofont.css')}}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Style.css')}} -->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/main.css')}}">

	<!-- Responsive.css')}}-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/responsive.css')}}">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/ablepro-lite/assets/css/color/color-1.min.css')}}" id="color"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
  @yield('content')

  <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/ablepro-lite/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('vendor/ablepro-lite/assets/plugins/tether/dist/js/tether.min.js')}}"></script>
  <!-- Required Fremwork -->
  <script src="{{asset('vendor/ablepro-lite/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- waves effects.js')}} -->
  <script src="{{asset('vendor/ablepro-lite/assets/plugins/Waves/waves.min.js')}}"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('vendor/ablepro-lite/assets/pages/elements.js')}}"></script>
</body>
</html>
