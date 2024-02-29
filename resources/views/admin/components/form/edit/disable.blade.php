<div class="form-group col-md-4">
    <label for="exampleInputuname"
           class="">{{$label}}</label>
    <div class="input-group">
        <input name="{{$name}}"
               disabled
               value="{{$item["$name"]}}"
               placeholder="{{$placeholder}}"
               type="text" class="form-control">
    </div>
</div>
