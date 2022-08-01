<!doctype html>
<html lang="zxx">


<!-- Mirrored from risingtheme.com/html/demo-suruchi/suruchi/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Apr 2022 12:09:45 GMT -->
<head>
  <meta charset="utf-8">
  <title>Suruchi - Fashion eCommerce HTML Template</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('asset-user')}}/img/favicon.ico">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{url('asset-user')}}/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{url('asset-user')}}/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="{{url('asset-admin')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/font-awesome.min.css"> --}}

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{url('asset-user')}}/css/style.css">

</head>

<body>

@include('user.layout.header')

@yield('main')

@include('user.layout.footer')

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
    
  <!-- All Script JS Plugins here  -->
  {{-- <script src="{{url('asset-admin')}}/js/jquery.min.js"></script>
  <script src="{{url('asset-admin')}}/js/jquery-ui.js"></script> --}}

  {{-- <!-- <script src="{{url('asset-user')}}/js/vendor/popper.js" defer="defer"></script> --> --}}
  {{-- <!-- <script src="{{url('asset-user')}}/js/vendor/bootstrap.min.js" defer="defer"></script> --> --}}
  {{-- <script src="{{url('asset-admin')}}/js/bootstrap.min.js"></script> --}}
  <script src="{{url('asset-user')}}/js/plugins/swiper-bundle.min.js"></script>
  <script src="{{url('asset-user')}}/js/plugins/glightbox.min.js"></script>

  
  <!-- Customscript js -->
  <script src="{{url('asset-user')}}/js/script.js"></script>
  
</body>

<!-- Mirrored from risingtheme.com/html/demo-suruchi/suruchi/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Apr 2022 12:10:12 GMT -->
</html>