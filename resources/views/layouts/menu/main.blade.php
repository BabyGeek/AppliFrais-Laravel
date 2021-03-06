<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard',['user_id' => Auth::user()->id]) }}"><i class="fa fa-home"></i> Accueil </a></li>
            <li><a><i class="fa fa-edit"></i> Frais <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="{{ route('module-costs.package.index',['user_id'=>Auth::user()->id]) }}">Frais forfait</a></li>
                    <li><a href="{{ route('module-costs.nonpackage.index',['user_id'=>Auth::user()->id]) }}">Frais hors forfait</a></li>
                </ul>
            </li>
            <li><a href="{{ route('module-costs.history.index', ['user_id' => Auth::user()->id]) }}"><i class="fa fa-desktop"></i> Historique </a></li>
        </ul>
    </div>
    @if (Auth::user()->role == Enum\UserRole::ADMINISTRATOR)
    <div class="menu_section">
        <h3>Menu Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('register') }}">
                    <i class="fa fa-user"></i>
                    Ajouter un utilisateur
                </a>
            </li>
        </ul>
    </div>
    @endif
    @if (Auth::user()->role == Enum\UserRole::ACCOUNTING or Auth::user()->role == Enum\UserRole::ADMINISTRATOR)
    <div class="menu_section">
        <h3>Menu Comptable</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('module-accounting.history.index', ['user_id' => Auth::user()->id]) }}">
                    <i class="fa fa-user"></i>
                    Historique des fiches
                </a>
            </li>
        </ul>
    </div>
    @endif
</div>