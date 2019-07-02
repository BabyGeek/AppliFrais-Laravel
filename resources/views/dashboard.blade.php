@extends('layouts.master', ['page_name' => 'Dashboard '.Enum\UserRole::create(Auth::user()->role). ' - Appli Frais'])

    @section('content')

@if(Auth::user()->role == Enum\UserRole::ADMINISTRATOR)
    @include('layouts.includes.dashboardAdministrator')
@else
    @if (Auth::user()->role == Enum\UserRole::VISITOR)
        @include('layouts.includes.dashboardVisitor')
    @else
        @if (Auth::user()->role == Enum\UserRole::ACCOUNTING)
            @include('layouts.includes.dashboardAccounting')
        @endif
    @endif
@endif

    @stop

