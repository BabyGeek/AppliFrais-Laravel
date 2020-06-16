@extends('layouts.master', ['page_name' => $user->first_name.' '.$user->last_name. ' - Mes frais forfait']) 

@section('heading-buttons')
<p>
    <a href="{{ route('dashboard', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info shadow-sm">
        <i class="fa fa-backward text-white-50"></i> Retour </a>

    <a href="{{ route('module-costs.package.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-success shadow-sm">
        <i class="fa fa-plus-circle text-white-50"></i> Nouveau frais forfait </a>

    <a href="#" class="btn btn-sm shadow-sm btn-primary" data-toggle="modal" data-target="#helpModal"><i class="fa fa-question-circle text-white-50"></i> Aide</a>
</p>

@component('modals.helpModal')
<strong>
    Aide ici
</strong> 
@endcomponent 
@endsection 
@section('content')
<div class="col">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title"> Affichage des frais forfaitaire pour le {{ Enum\UserRole::create($user->role).' '.$user->first_name.' '.$user->last_name }}</h5>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th class="column-title text-center"> N° </th>
                            <th class="column-title text-center"> Libellé </th>
                            <th class="column-title text-center"> Quantité </th>
                            <th class="column-title text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('costs::listings.costs.package.listing', $user->packages, 'package', 'costs::listings.costs.package.emptyListing')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection