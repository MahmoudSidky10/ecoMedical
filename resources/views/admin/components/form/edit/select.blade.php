<div class="form-group">
    <label class="required" >{{$label}}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="{{$icon}}"></i></span>
        </div>
        <select required class="form-control" name="{{$name}}">
            @foreach($items as $selectItem)
                <option @if($item[$name] == $selectItem->id) selected @endif
                value="{{$selectItem->id}}">{{$selectItem->name}}</option>
            @endforeach
        </select>
    </div>
</div>
