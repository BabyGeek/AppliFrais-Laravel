<div class="col-md-6 col-sm-6 col-xs-12 profile_details">
    <div class="well profile_view">
        <div class="col-sm-12">
            <h4 class="brief"><i>{{ $user->first_name.' '.$user->last_name }}</i></h4>
            <div class="left col-xs-7">
                <p><strong>Poste : </strong> {{ Enum\UserRole::create($user->role) }}</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-building"></i> Addresse : {{ $user->address }}</li>
                    <li><i class="fa fa-at"></i> Email : {{ $user->email }}</li>
                    <li><i class="fa fa-id-badge"></i> Fiches forfait : {{ $user->packages->count() }}</li>
                    <li><i class="fas fa-id-badge"></i> Fiches Hors forfait : {{ $user->nonpackages->count() }}</li>
                </ul>
            </div>
            <div class="right col-xs-5 text-center">
                <img src="images/img.jpg" alt="" class="img-circle img-responsive">
            </div>
        </div>
        <div class="col-xs-12 bottom text-center">
            <div class="col-xs-12 col-sm-6 emphasis">
            </div>
            <div class="col-xs-12 col-sm-6 emphasis">
                <a href="{{ route('module-accounting.user.detail', ['user_id' => Auth::user()->id, 'profile_id' => $user->id]) }}">
                    <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> Plus de détails
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
