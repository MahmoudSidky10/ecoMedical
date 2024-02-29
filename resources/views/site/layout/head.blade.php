<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{__("language.appName")}}</title>
    <meta name="keywords" content="e-commerce"/>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/vendor/fontawesome-free/css/all.min.css")}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/vendor/owl-carousel/owl.carousel.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/vendor/animate/animate.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/vendor/magnific-popup/magnific-popup.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/vendor/photoswipe/photoswipe.min.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("assets/site/vendor/photoswipe/default-skin/default-skin.min.css")}}">

    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <!-- Default CSS -->
    <!-- en style -->
{{--     <link rel="stylesheet" type="text/css" href="{{asset("assets/site/css/style.min.css")}}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/css/demo10.min.css")}}">--}}
<!-- rtl style -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/css/rtl_style.css")}}">

    @php
        set_time_limit(0);
          // Get all the content of the file
          $content = file_get_contents("../public/assets/site/css/rtl_demo10.css");
          // Replace "John Doe" with "Jeanne Doe"
          $color = \App\Models\Setting::latest()->first();
          if (!$color){ $color = "#42a4e8"; }else{ $color = $color->app_color; }
          $contentReplace = str_replace('#42a4e8', $color, $content);
          // Open the file in writing mode
          $file = fopen('../public/assets/site/css/color_rtl_demo10.css', 'w');
          // Replace the content of the `test.txt` by the new content generated
          fwrite($file, $contentReplace);
    @endphp

    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/css/color_rtl_demo10.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/site/css/custom.css")}}">

    <style>
        .hide {
            display: none !important;
        }
    </style>
    @yield("css")
</head>