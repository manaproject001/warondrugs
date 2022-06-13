<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">218</h3>
                            <p class="text-success ms-2 mb-0 font-weight-medium">+3%</p>
                        </div>
                        </div>
                        <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Kasus Narkoba</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">270</h3>
                                <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Tersangka Kasus Narkoba</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">484</h3>
                                <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Pasien Penyalahgunaan</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">3,668</h3>
                                <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Jumlah Penggiat Kasus Narkoba</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kasus</h4>
                    <canvas id="areaChart"></canvas>
                </div> 
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Persentase Tersangka</h4>
                    <canvas id="doughnutChart" style="height:250px"></canvas>
                </div> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Sebaran Kasus</h4>
            <div class="row">
                <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table">
                    <tbody>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-us"></i>
                        </td>
                        <td>USA</td>
                        <td class="text-right"> 1500 </td>
                        <td class="text-right font-weight-medium"> 56.35% </td>
                        </tr>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-de"></i>
                        </td>
                        <td>Germany</td>
                        <td class="text-right"> 800 </td>
                        <td class="text-right font-weight-medium"> 33.25% </td>
                        </tr>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-au"></i>
                        </td>
                        <td>Australia</td>
                        <td class="text-right"> 760 </td>
                        <td class="text-right font-weight-medium"> 15.45% </td>
                        </tr>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-gb"></i>
                        </td>
                        <td>United Kingdom</td>
                        <td class="text-right"> 450 </td>
                        <td class="text-right font-weight-medium"> 25.00% </td>
                        </tr>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-ro"></i>
                        </td>
                        <td>Romania</td>
                        <td class="text-right"> 620 </td>
                        <td class="text-right font-weight-medium"> 10.25% </td>
                        </tr>
                        <tr>
                        <td>
                            <i class="flag-icon flag-icon-br"></i>
                        </td>
                        <td>Brasil</td>
                        <td class="text-right"> 230 </td>
                        <td class="text-right font-weight-medium"> 75.00% </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="col-md-7">
                <div id="audience-map" class="vector-map"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>