<ul class="nav">
    <li class="nav-item profile">
    <div class="profile-desc">
        <div class="profile-pic">
            <div class="count-indicator">
                <img class="img-xs rounded-circle " src="<?=base_url('assets/images/faces/face15.jpg')?>" alt="">
                <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                <span>Penyidik</span>
            </div>
        </div>
    </div>
    </li>
    <li class="nav-item nav-category">
    <span class="nav-link">Menu</span>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" href="<?=site_url('admin/dashboard')?>">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" href="<?=site_url('admin/kasus')?>">
            <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Data Kasus</span>
        </a>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" href="<?=site_url('admin/pelaku')?>">
            <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Data Pelaku</span>
        </a>
    </li>
</ul>