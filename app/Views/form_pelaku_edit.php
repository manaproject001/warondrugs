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
                    <div class="text-center">
                        <a data-fancybox data-src="<?=base_url('assets/images/foto/'.$pelaku['foto']);?>" data-caption="<?= $pelaku['nama'] ?>">
                            <img src="<?=base_url('assets/images/foto/'.$pelaku['foto']);?>" width="100" />
                        </a>
                    </div>
                    <h4 class="card-title">Data Diri</h4>
                    <?= form_open_multipart(site_url('admin/pelaku/').$pelaku['id_pelaku'].'/editProses'); ?>
                    
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
                                        <select class="form-control" name="profil" id="profil" onchange="show()" required>
                                            <option>-- Pilih --</option>
                                            <option value="Pengguna" <?= $pelaku['profil'] == 'Pengguna' ? 'selected':'' ?>>Pengguna</option>
                                            <option value="Kurir" <?= $pelaku['profil'] == 'Kurir' ? 'selected':'' ?>>Kurir</option>
                                            <option value="Bandar" <?= $pelaku['profil'] == 'Bandar' ? 'selected':'' ?>>Bandar</option>
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
                        <p class="card-description"> Informasi Keterlibatan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kasus</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="id_kasus" id="id_kasus">
                                            <option>-- Pilih --</option>
                                            <?php foreach ($kasuss as $kasus) : ?>
                                                <option value="<?=$kasus['id_kasus']?>"<?= $kasus['id_kasus'] == $pelaku['id_kasus'] ? 'selected':'' ?>><?=$kasus['kasus']?></option>
                                            <?php endforeach ?>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keterlibatan Dengan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control id_atasan" name="id_atasan" id="id_atasan" <?= $pelaku['profil'] == 'Bandar' ? 'disabled':'' ?> >
                                        <option>-- Pilih --</option>
                                            <?php foreach ($pelakus as $pel) : ?>
                                                <option value="<?=$pel['id_pelaku']?>"<?= $pel['id_pelaku'] == $pelaku['id_atasan'] ? 'selected':'' ?>><?=$pel['nama']?> {<?=$pel['profil']?>} <?=$pel['kasus']?></option>
                                            <?php endforeach ?> 
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
                                        <input type="file" name="file_upload" class="form-control">
                                        <input type="text" class="form-control"  name="file_upload_old" value="<?= $pelaku['foto'] ?>" hidden/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" name="edit" value="edit" class="btn btn-success btn-lg">Edit</button>
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
                    var html = '';
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
                    var html = '';
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
<!-- -->
<?= $this->endSection() ?>