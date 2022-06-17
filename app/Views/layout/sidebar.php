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
        <a class="nav-link" href="<?=site_url('admin')?>">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item menu-items">
        <a class="nav-link" href="<?=site_url('admin/kasus')?>">
            <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
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
    <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#master-data" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Master Data</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="master-data">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('admin/data/jenis_narkoba')?>">Jenis Narkoba</a></li>
            </ul>
        </div>
    </li>
</ul>