@extends('layouts.master', ['page_name' => 'Frais de '.$profile->first_name.' '.$profile->last_name,])

@section('content')
    <div class="clearfix"></div>
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
    <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
    </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
    <h3> {{ $profile->first_name }} {{ $profile->last_name }} </h3>
    <ul class="list-unstyled user_data">
    <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $profile->address }}
    </li>
    <li>
    <i class="fa fa-briefcase user-profile-icon"></i> {{ Enum\UserRole::create($profile->role) }}
    </li>
    <li class="m-top-xs">
    <i class="fa fa-car"></i> {{ $profile->car->cv }} chevaux fiscaux
    </li>
    </ul>
    <br>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
    
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#frais_forfais" id="forfais-tab" role="tab" data-toggle="tab" aria-expanded="true">Frais frofais</a>
    </li>
    <li role="presentation" class=""><a href="#frais_hors_forfais" role="tab" id="hors_forfait-tab" data-toggle="tab" aria-expanded="false">Frais hors frofais</a>
    </li>
    
    </ul>
    <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="frais_forfais" aria-labelledby="forfais-tab">

    <ul class="messages">
        @each('accounting::listings.userForfaisListing', $profile->packages, 'package', 'accounting::listings.userForfaisListingEmpty')
    </ul>

    </div>
    <div role="tabpanel" class="tab-pane fade in" id="frais_hors_forfais" aria-labelledby="hors_forfais-tab">
        <ul class="messages">
            @each('accounting::listings.userHorsForfaisListing', $profile->nonpackages, 'package', 'accounting::listings.userForfaisListingEmpty')
            
        </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection