<!doctype html>
<html lang="en-US">
<head>
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Streamit - Responsive Bootstrap 4 Template</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="/images/favicon.ico"/>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="/css/bootstrap.min.css"/>
   <!-- Typography CSS -->
   <link rel="stylesheet" href="/css/typography.css">
   <!-- Style -->
   <link rel="stylesheet" href="/css/style.css"/>
   <!-- Responsive -->
   <link rel="stylesheet" href="/css/responsive.css"/>
</head>
<body>

<!-- loader Start -->
<div id="loading">
   <div id="loading-center">
   </div>
</div>
<!-- loader END -->

<!-- Header -->
@include('parts.header')
<!-- Header END -->


<!-- MainContent -->
@yield('content')
<!-- MainContent End-->

<!-- Footer -->
@include('parts.footer')
<!-- Footer END -->


<!-- jQuery, Popper JS -->
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.min.js"></script>
<!-- Slick JS -->
<script src="/js/slick.min.js"></script>
<!-- owl carousel Js -->
<script src="/js/owl.carousel.min.js"></script>
<!-- select2 Js -->
<script src="/js/select2.min.js"></script>
<!-- Magnific Popup-->
<script src="/js/jquery.magnific-popup.min.js"></script>
<!-- Flatpickr JavaScript -->
<script src="js/flatpickr.min.js"></script>
<!-- Slick Animation-->
<script src="/js/slick-animation.min.js"></script>
<!-- Custom JS-->
<script src="/js/custom.js"></script>
</body>
</html>