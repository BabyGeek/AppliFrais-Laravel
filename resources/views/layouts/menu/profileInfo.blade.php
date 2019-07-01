<div class="profile clearfix">
    <div class="profile_pic">
        <img src="/images/img.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span> Bienvenu, </span>
        <h2>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h2>
        <span>{{ Enum\UserRole::create(Auth::user()->role) }}</span>
    </div>
        <div class="clearfix"></div>
</div>
