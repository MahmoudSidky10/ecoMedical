@extends('admin.layout.index')
@section('content')
    <br><br>
    <div style="margin: 0 auto;" class="col-lg-12">
        <nav class="page-breadcrumb">
            @yield('nav')
            <br>
        </nav>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">@yield("title")</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form p-t-20" enctype="multipart/form-data"
                      method="post" action="{{url("admin/")}}/@yield("action")">
                    @csrf
                    @method("put")
                    @yield("form-groups")
                    <button type="submit"
                            class="btn btn-success col-md-1 waves-effect waves-light m-r-10">@yield("submit-button-title")</button>
                </form>
            </div>
        </div>
    </div>
@endsection
