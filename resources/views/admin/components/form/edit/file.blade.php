<div class="form-group">
    <label for="exampleInputuname" class="required">{{$label}}</label>
    <div class="input-group">
        <input type="file"
               accept="image/x-png,image/gif,image/jpeg"
               data-default-file="{{asset($item["$name"])}}"
               name="{{$name}}" class="dropify"
               data-max-file-size="{{$max}}M"/>
    </div>
</div>
