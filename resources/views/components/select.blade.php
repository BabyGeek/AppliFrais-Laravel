
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{ $name }}">
                {{ $label }}
            </label>
            <div class="ccol-md-6 col-sm-6 col-xs-12">
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
