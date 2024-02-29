<a href="@if(isset($href)) {{url("$href")}}  @else javascript:;@endif" class="menu-link menu-toggle">
    <i class="{{$icon}}"></i>
    <span class="menu-text">{{ucfirst($title)}}</span>
</a>

