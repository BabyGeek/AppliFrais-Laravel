@component('components.label', ['label' => $label, 'attrs' => isset($attrsLabel) ? $attrsLabel : null])
    {{ $slot }}
@endcomponent
@component('components.input',['type' => $type, 'attrs' => $attrs, 'name' => $name, 'value' => isset($model) ? ($model->$name) : null, 'divClass' => isset($divClass) ? $divClass : null, ])

@endcomponent
