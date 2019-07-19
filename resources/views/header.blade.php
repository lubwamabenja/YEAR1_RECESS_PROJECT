<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta property="og:title" content="Welcome to UTF"></meta>
 		
		<meta property="og:description" content="" /> 
		
		<title>UFT | welcome</title> 
			<!-- Bootstrap core CSS -->
	    <link  rel="stylesheet"   href="{{ URL::asset ('vendor/bootstrap/css/bootstrap.min.css') }}">

	    <!-- Custom fonts for this template -->
	    <link href="{{ URL::asset ('https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900') }}" rel="stylesheet">
	    <link href="{{ URL::asset ('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i') }}" rel="stylesheet">
	    <link href="{{ URL::asset ('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset ('vendor/devicons/css/devicons.min.css') }}" rel="stylesheet">
	    <link href="{{ URL::asset ('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="{{ URL::asset ('css/resume.min.css') }}" rel="stylesheet">


	</head> 
	<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">UFT</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/logo1.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/home">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/donations">Donations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/districts">Districts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="payments">Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/agents">Agents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/members">Members</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid p-0">
    	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">

     
		<center> <h2 id="headline"><b>United Front for Transformation   </b></h2> </center>

		@yield('content')  
		
	</div>
</section>
	</div>
  
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset ('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset ('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset ('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset ('js/resume.min.js') }}"></script>
	</body>
</html>


