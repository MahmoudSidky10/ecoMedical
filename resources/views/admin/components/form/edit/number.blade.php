<div class="form-group">
    <label for="exampleInputuname" class="@if(isset($required) and $required == "required") required @endif ">{{$label}}</label>
    <div class="input-group">
        <input name="{{$name}}"
               @if(isset($required) and $required == "required") required @endif
               value="{{$item["$name"]}}"
               placeholder="{{$placeholder}}"
               type="number" class="form-control" >
    </div>
</div>
