<div class="col-lg-6">
        <input type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $id }}"
                value="{{ (isset($value) && !old($name)) ? $value : old($name) }}"
                @if (isset($attrs))
                    @foreach ($attrs as $attr => $value)
                        {{$attr}} = "{{$value}}"
                    @endforeach
                @endif

                class="@error("$name") is-invalid @enderror form-control {{ (isset($attrs['class']))?$attrs['class']:'' }}" data-input>
                    {{ $slot }}
                @error($name)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
</div>

