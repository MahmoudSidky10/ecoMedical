@extends('site.layout.index')
@section('body-class'," ")
@section('content')

    <main class="main">
        <div class="page-content">
            <div class="banner"
                 style="background-image: url({{asset("/assets/site/images/Coming-soon.jpg")}}); background-color: #333;height: 700px">
                <div class="coming-content-wrapper d-flex align-items-center justify-content-end  ">
                    <div class="coming-content">
                        <h2 class="coming-title  ">Thank you for <span style="font-size: 100px">Subscribing </span></h2>
                        <p> Stay tuned for more information to our newsletter to stay updated on our progress.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection



