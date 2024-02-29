<div class="form-group">
    <label for="exampleInputuname" class="@if(isset($required) and $required == "required") required @endif">@if(isset($label)) {{$label}} @endif</label>
    <input @if(isset($required) and $required == "required") required @endif name="{{$name}}" type="text"
           value="{{request()->filter ? request()->filter : ''}}"
           class="form-control" placeholder="{{$placeholder}}">
    <span class="form-text text-muted">@if(isset($note))  {{$note}} @endif</span>
</div>
