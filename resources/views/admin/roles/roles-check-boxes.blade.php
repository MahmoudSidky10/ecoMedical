<div class="form-group">
    <br>
    <label class="required" for="permissions">{{ __('language.permissions') }}</label>
    <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                      style="border-radius: 0">{{ __('language.select_all') }}</span>
        <span class="btn btn-info btn-xs deselect-all"
              style="border-radius: 0">{{ __('language.deselect_all') }}</span>
    </div>
    @foreach($permissionCategories as $category)
        <h2>{{$category->name}}</h2>
        <hr>
        <div class="checkbox-inline">
            @foreach($category->permissions as $permission)

                <label class="checkbox" for="ch_{{$permission->id}}">
                    <input id="ch_{{$permission->id}}" type="checkbox" name="permissions[]"
                           value="{{$permission->id}}"
                           {{ $item->permissions->contains($permission->id) ? 'checked' : ''}}
                           class="rolecheckbox ">
                    <span></span>{{$permission->name ? $permission->name : $permission->title}}
                </label>
            @endforeach

            @if($errors->has('permissions'))
                <div class="invalid-feedback">
                    {{ $errors->first('permissions') }}
                </div>
            @endif

        </div>
    @endforeach
</div>
