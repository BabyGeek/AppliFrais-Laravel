<div class="alert alert-{{ $type ?? null }} alert-shadow alert-fixed-right animated lightSpeedIn" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">{{ $title ?? null }}</h4>
    {!! $content??null !!}
</div>
      