@foreach($items as $item)

    @if ($item->section_id == "most-seller" )
        <div id="most-seller">
            most-seller
        </div>
    @endif

    @if ($item->section_id == "The-latest-addition" )
        <div id="The-latest-addition">
            The-latest-addition
        </div>
    @endif

    @if ($item->section_id == "The-most-wanted" )
        <div id="The-most-wanted">
            The-most-wanted
        </div>
    @endif

@endforeach


