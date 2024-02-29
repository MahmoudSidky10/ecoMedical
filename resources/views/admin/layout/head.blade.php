<head>
    <meta charset="utf-8"/>
    <title>Ecommerce | Dashboard Page </title>
    <meta name="description" content="Page with empty content"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- link for fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <style>

    </style>
    <link href="{{url('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet">
    <link href="{{url('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet">

    @if(App::isLocale('ar'))
        <link href="{{url('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet">
        <link href="{{url('assets/admin/css/custom.css')}}" rel="stylesheet">
    @else
        <link href="{{url('assets/admin/css/style.bundle.css')}}" rel="stylesheet">
    @endif

    <link href="{{asset("assets/admin/css/dropify.min.css")}}" rel="stylesheet"/>
    <link href="{{url('assets/admin/media/logos/favicon.ico')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('assets/admin/css/dropify.min.css')}}">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap');

        body {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>


    <style>
        .img-responsive {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .required:after {
            content: " *";
            color: red;
        }


        /*h1, h2, h3, h4, h5, h6, p, input, textarea, span, a, td, th {*/
        /*    font-family: 'Cairo', sans-serif !important;*/
        /*}*/

        .hide {
            display: none !important;
        }
    </style>

    @yield("css")
</head>

