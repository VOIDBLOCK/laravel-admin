<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id['lat']}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div class="clearfix map-coords-inputs" style="padding: 20px 0;">
            <div style="display: inline-block; width: 45%; overflow:hidden; box-sizing: border-box; padding: 0; margin: 0;">
                <span class="control-label"> {{ __('admin.lat') }} </span>
                <input style="margin: 5px; direction: ltr;" class="form-control" type="text" id="{{$id['lat']}}" name="{{$name['lat']}}" value="{{ old($column['lat'], $value['lat']) }}" {!! $attributes !!} />
            </div>
            <div style="display: inline-block; width: 45%; overflow:hidden; box-sizing: border-box; padding: 0; margin: 0;">
                <span class="control-label"> {{ __('admin.lng') }} </span>
                <input style="margin: 5px; direction: ltr;" class="form-control" type="text" id="{{$id['lng']}}" name="{{$name['lng']}}" value="{{ old($column['lng'], $value['lng']) }}" {!! $attributes !!} />
            </div>
        </div>
        <div id="map_{{$id['lat'].$id['lng']}}" style="width: 100%;height: 300px"></div>

        @include('admin::form.help-block')

    </div>
</div>

