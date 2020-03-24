@extends('layouts.master', ['page_name' => 'Ajout d\'un membre GSB '])

@section('heading-buttons')
<p>
    <a href="{{ route('user') }}" class="btn btn-sm btn-info shadow-sm">
            <i class="fas fa-backward text-white-50"></i> Retour </a>

        <a href="#" class="btn btn-sm shadow-sm btn-primary" data-toggle="modal" data-target="#helpModal"><i class="fas fa-question-circle text-white-50"></i> Aide</a>
</p>

@component('modals.helpModal')
    <strong>
        Aide ici
    </strong>
@endcomponent

@endsection

@section('content')
<div class="row">
    @include('auth.forms.form', ['legend' => 'Formulaire pour ajouter un membre GSB', 'action' =>  route('register')])
</div>
@endsection

@section('script')

<script>
        flatpickr("#date", {
            locale: "fr",
            altInput: true,
            altFormat: "j F Y",
            enableTime: false,
            dateFormat: "Y-m-d",
            });
</script>
@endsection
