@extends('layouts.master', ['page_name' => $user->first_name.' '.$user->last_name. ' - Mes frais forfait - Modifier un frais forfait'])

@section('heading-buttons')
<p>
    <a href="{{ route('module-costs.package.index', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info shadow-sm">
            <i class="fas fa-backward text-white-50"></i> Retour </a>

    <a href="{{ route('module-costs.package.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-success shadow-sm">
        <i class="fas fa-plus-circle text-white-50"></i> Entrer un nouveau frais forfait </a>

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
    @include('costs::forms.costs.nonpackage.form', ['legend' => 'Formulaire pour modifier un frais hors forfait', 'action' =>  route('module-costs.package.store', ['user_id'=> $user->id]), 'method'=>'POST', 'txtbtn' => 'Modifier'])
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
