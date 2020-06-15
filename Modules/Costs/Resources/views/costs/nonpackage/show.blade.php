@extends('layouts.master', ['page_name' => $user->first_name.' '.$user->last_name. ' - Mes frais hors forfait - Détails'])

@section('heading-buttons')
<p>
    <a href="{{ route('module-costs.nonpackage.index', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info shadow-sm">
        <i class="fa fa-backward text-white-50"></i> Retour </a>

    <a href="{{ route('module-costs.nonpackage.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-success shadow-sm">
        <i class="fa fa-plus-circle text-white-50"></i> Entrer un frais hors forfait </a>

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
    <div class="x_panel">
        <div class="x_title">
            <h2> Détails - {{ $nonpackage->label }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col col-md col-xs">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Détails </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="x_content">
                                <div class="row">
                                    <p> Appellation : {{ $nonpackage->label }}</p>
                                    <p> Date : {{ $nonpackage->date->format('m-Y') }}</p>
                                    <p> Nombre de jsutificatif : {{ $nonpackage->justificates->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md col-xs">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Détails - Justificatifs</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="x_content">
                                <div class="row">
                                    @if ($nonpackage->justificates->count() > 0)
                                    @each('costs::listings.costs.nonpackage.listingJustificates', $nonpackage->justificates, 'justificate')
                                    <a class="btn btn-primary" href="{{ route('module-costs.nonpackage.justificate.create', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]) }}"> Ajouter un justificatif</a>
                                    @else
                                    <a class="btn btn-primary" href="{{ route('module-costs.nonpackage.justificate.create', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]) }}"> Ajouter un justificatif</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
