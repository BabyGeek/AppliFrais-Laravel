<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Accueil </a></li>
            <li><a><i class="fa fa-edit"></i> Frais <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('module-costs.package.index',['user_id'=>Auth::user()->id]) }}">Frais forfait</a></li>
                    <li><a href="{{ route('module-costs.nonpackage.index',['user_id'=>Auth::user()->id]) }}">Frais hors forfait</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-desktop"></i> Historique </a></li>
        </div>
</div>
