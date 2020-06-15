
<div class="custom-file">
    <input type="file" 
    name="{{ $name }}" 
    class="custom-file-input" 
    id="{{ $name }}"
    value="{{ (isset($value) && !old($name)) ? $value : old($name) }}"
    @if (isset($attrs))
        @foreach ($attrs as $attr => $value)
            {{$attr}} = "{{$value}}"
        @endforeach
    @endif
    >
    <label class="custom-file-label" for="{{ $name }}">{{ $label }}</label>
</div>