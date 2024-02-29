<div class="form-group">
    <label for="exampleInputuname">{{$label}}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
        </div>
        <input name="{{$name}}[]"
               value="{{$item["$name"]}}"
               placeholder="{{$placeholder}}"
               type="text" class="form-control" >
    </div>
</div>
