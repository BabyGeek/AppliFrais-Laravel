@extends('layouts.master', ['page_name' => $user->first_name.' '.$user->last_name. ' - Frais des visiteurs']) 

@section('heading-buttons')
<p>
    <a href="{{ route('dashboard', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info shadow-sm">
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
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <ul class="pagination pagination-split">

        </ul>
    </div>
    <div class="clearfix"></div>
    @each('accounting::listings.listing', $users, 'user')
    
</div>


@endsection
