
<div class="{{ isset($divClass) ? $divClass : '' }}">
        <input type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ (isset($value) && !old($name)) ? $value : old($name) }}"
                @if (isset($attrs))
                    @foreach ($attrs as $attr => $value)
                        {{$attr}} = "{{$value}}"
                    @endforeach
                @endif

                class="form-control col-md-7 col-xs-12 @error("$name") parsley-error @enderror form-control {{ (isset($attrs['class']))?$attrs['class']:'' }}">

                @error($name)
                    <div class="text-danger">{{ $message }}</div>
                @enderror

    </div>

