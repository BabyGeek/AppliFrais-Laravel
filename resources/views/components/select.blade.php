
            <label class="control-label" for="{{ $name }}">
                {{ $label }}
            </label>
            <div class="">
                <select class="select2_single form-control @error("$name") parsley-error @enderror" name="{{ $name }}" id="{{ $name }}"
                        @if (isset($attrs))
                            @foreach ($attrs as $attr => $value)
                                {{$attr}} = "{{$value}}"
                            @endforeach
                        @endif>
                    {{ $slot }}
                </select>
                @error($name)
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
