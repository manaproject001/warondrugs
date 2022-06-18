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
                    <?= form_open_multipart(base_url('admin/pelaku/tambahProses')); ?>
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
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
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
                                        <select class="form-control" name="profil" id="profil" onchange="show()" required>
                                            <option>-- Pilih --</option>
                                            <option value="Pengguna">Pengguna</option>
                                            <option value="Kurir">Kurir</option>
                                            <option value="Bandar">Bandar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Narkoba</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_narkoba[]" class="js-example-basic-multiple" style="width:100%" required  multiple="multiple">
                                        <?php foreach ($jeniss as $jen) : ?>
                                            <option value="<?=$jen['id_jenis_narkoba']?>"><?=$jen['jenis_narkoba']?></option>
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
                        <p class="card-description"> Informasi Keterlibatan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kasus</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_kasus" id="id_kasus" disabled>
                                            <option>-- Pilih --</option>
                                            <?php foreach ($kasuss as $kasus) : ?>
                                                <option value="<?=$kasus['id_kasus']?>"><?=$kasus['kasus']?></option>
                                            <?php endforeach ?>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keterlibatan Kurir</label>
                                    <div class="col-sm-9">
                                        <select class="form-control id_atasan" name="id_atasan" id="id_atasan" >
                                            <option>-- Pilih --</option>
                                            </script>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="card col-6 align-self-center" >
                                <div class="card-header">
                                    <h5 class="card-title text-center">Foto Pelaku</h5>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                         File uploader with image preview 
                                        <input type="file" name="file_upload" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="file" name="gambar"> -->
                        <center>
                            <button type="submit" name="status" value="simpan" class="btn btn-success btn-lg">Simpan</button>
                        </center>
                        
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
    function show(){
        document.getElementById("id_kasus").disabled = false;
        document.getElementById("id_kasus").value = "-- Pilih --";
        document.getElementById("id_atasan").value = "-- Pilih --";
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_kasus').click(function(){
            var id=$(this).val();
            var profil=$('#profil option:selected').val();
            console.log(profil);
            $.ajax({
                url : "<?php echo base_url();?>/index.php/kategori/get_kasus",
                method : "POST",
                data : {id: id, profil: profil},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '<option>-- Pilih --</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_pelaku+'>'+data[i].nama+' {'+data[i].profil+'} '+data[i].kasus+'</option>';
                    }
                    $('.id_atasan').html(html);
                     
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>