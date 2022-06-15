<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form elements </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Diri</h4>
                    <form class="form-sample" action="<?= site_url('admin/pelaku/').$pelaku['id_pelaku'].'/editProses'?>" method="post" id="text-editor">
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $pelaku['nama'] ?>" required/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tempat_lahir" class="form-control" value="<?= $pelaku['tempat_lahir'] ?>" placeholder="Kota"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option>-- Pilih --</option>
                                            <option <?= $pelaku['jenis_kelamin'] == 'Pria' ? 'selected':'' ?>>Pria</option>
                                            <option <?= $pelaku['jenis_kelamin'] == 'Wanita' ? 'selected':'' ?>>Wanita</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tanggal_lahir" value="<?= $pelaku['tanggal_lahir'] ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Negara" name="kewarganegaraan" value="<?= $pelaku['kewarganegaraan'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="KTP" name="nik" value="<?= $pelaku['nik'] ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description"> Informasi Penangkapan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sebagai</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="profil">
                                            <option>-- Pilih --</option>
                                            <option <?= $pelaku['profil'] == 'Pengguna' ? 'selected':'' ?>>Pengguna</option>
                                            <option <?= $pelaku['profil'] == 'Kurir' ? 'selected':'' ?>>Kurir</option>
                                            <option <?= $pelaku['profil'] == 'Bandar' ? 'selected':'' ?>>Bandar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Narkoba </label>
                                    <div class="col-sm-9">
                                        <select name="jenis_narkoba[]" class="js-example-basic-multiple" style="width:100%" required  multiple="multiple">
                                            <?php 
                                                if($pelaku['narkoba']!=""){
                                                    $ar=explode(",",$pelaku['narkoba']);
                                                }else{
                                                    $ar=[];
                                                }
                                                function cek($txt,$a){if (in_array($txt, $a)){echo "Selected";}else{echo "";}
                                                }
                                            ?>
                                            <?php foreach ($jeniss as $jen) : ?>
                                                <option value="<?=$jen['id_jenis_narkoba']?>" <?php cek($jen['jenis_narkoba'],$ar) ?>><?=$jen['jenis_narkoba']?></option>
                                            <?php endforeach ?> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lokasi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Lokasi Penangkapan" name="tkp" value="<?= $pelaku['tkp'] ?>"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Berat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="gram" name="berat" value="<?= $pelaku['berat'] ?>"/>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Unit yang menangani" name="unit" value="<?= $pelaku['unit'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Uang Sitaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Uang yang disita" name="uang_sita" value="<?= $pelaku['uang_sita'] ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" name="edit" value="edit" class="btn btn-success btn-lg">Edit</button>
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>