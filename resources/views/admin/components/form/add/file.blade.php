<div class="form-group @if(isset($class))  {{$class}} @endif ">
    <label for="exampleInputuname" class="">{{$label}}</label>
    <div class="input-group">
        <input type="file"
               accept="image/x-png,image/gif,image/jpeg"
               name="{{$name}}" class="dropify "
               data-max-file-size="{{$max}}M"/>
    </div>
</div>
