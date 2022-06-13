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
                    <form class="form-sample" action="" method="post" id="text-editor">
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota"/>
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
                                            <option>Pria</option>
                                            <option>Wanita</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tanggal_lahir"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Negara" name="kewarganegaraan"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="KTP" name="nik"/>
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
                                            <option>Pengguna</option>
                                            <option>Kurir</option>
                                            <option>Bandar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Narkoba</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_narkoba[NL][]" class="js-example-basic-multiple" style="width:100%" required  multiple="multiple">
                                            <option>Sabu-sabu</option>
                                            <option>Ganja</option>
                                            <option>Heroin</option>
                                            <option>Ekstasi</option>
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
                                    <input type="text" class="form-control" placeholder="Lokasi Penangkapan" name="tkp"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Berat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="gram" name="berat"/>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Unit yang menangani" name="unit"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Uang Sitaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Uang yang disita" name="uang_sita"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" name="status" value="simpan" class="btn btn-success btn-lg">Simpan</button>
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>