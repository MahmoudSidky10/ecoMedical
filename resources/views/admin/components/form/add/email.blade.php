
<div class="form-group">
    <label for="exampleInputuname" class="required">{{$label}}</label>
    <input required name="{{$name}}" type="email" value="{{request()->filter ? request()->filter : ''}}"
           class="form-control" placeholder="{{$placeholder}}">
    <span class="form-text text-muted">@if(isset($note))  {{$note}} @endif</span>
</div>
