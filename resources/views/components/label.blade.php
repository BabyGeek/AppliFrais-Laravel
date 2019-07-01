<label for={{ $label }}
        class="control-label col-md-3 col-sm-3 col-xs-12 {{ (isset($attrs['class']))?$attrs['class']:'' }}"
        @if (isset($attrs))
            @foreach ($attrs as $attr => $value)
                @if($attr != 'class')
                    {{$attr}} = "{{$value}}"
                @endif
            @endforeach
        @endif
>

        {{$slot}}
</label>
