@extends('site.layout.index')
@section('body-class'," ")
@section('content')

    <main class="main order">

        <!-- Start of payment -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                
                <iframe class="pt-5" src="{{$pay}}" width="100%" height="640" frameborder="none" >  </iframe>

            </div>
        </div>
        <!-- End of payment -->
    </main>

@endsection



