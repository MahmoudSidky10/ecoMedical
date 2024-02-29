<div class="form-group">
    <label class="required">{{$label}}</label>
    <div class="">
        <select    class="form-control {{$name}} " name="{{$name}}">
            @foreach($items as $selectItem)
                <option value="{{$selectItem->id}}">{{$selectItem->name}}</option>
            @endforeach
        </select>
    </div>
</div>
