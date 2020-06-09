@extends('layouts.master', ['page_name' => $user->first_name.' '.$user->last_name. ' - Mes frais forfait - Ajouter un frais forfait'])

@section('heading-buttons')
<p>
    <a href="{{ route('module-costs.package.index', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info shadow-sm">
            <i class="fa fa-backward text-white-50"></i> Retour </a>

        <a href="#" class="btn btn-sm shadow-sm btn-primary" data-toggle="modal" data-target="#helpModal"><i class="fa fa-question-circle text-white-50"></i> Aide</a>
</p>

@component('modals.helpModal')
    <strong>
        Aide ici
    </strong>
@endcomponent

@endsection

@section('content')
<div class="row">
    @include('costs::forms.costs.package.form', ['legend' => 'Formulaire pour ajouter un frais forfait', 'action' =>  route('module-costs.package.store', ['user_id'=> $user->id]), 'method'=>'POST','txtbtn' => 'Ajouter' ])
</div>
@endsection
