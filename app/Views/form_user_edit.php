<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Form Edit User </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        
                    </div>
                    <h4 class="card-title">Data Diri</h4>
                    <?= form_open_multipart(site_url('admin/user/').$user['user_id'].'/editProses'); ?>
                    
                        <p class="card-description"> Personal info </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" placeholder="Nama Lengkap" value="<?= $user['user_name'] ?>" required/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" value="<?= $user['user_email'] ?>" placeholder="Kota"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" value="<?= $user['user_title'] ?>" placeholder="Kota"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-md-center">
                            <div class="card col-6 align-self-center" >
                                <div class="card-header">
                                    <h5 class="card-title text-center">Foto User</h5>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <input type="file" name="file_upload" class="form-control">
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
                        html += '<option value='+data[i].user_id+'>'+data[i].nama+' {'+data[i].profil+'} '+data[i].kasus+'</option>';
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
                        html += '<option value='+data[i].user_id+'>'+data[i].nama+' {'+data[i].profil+'} '+data[i].kasus+'</option>';
                    }
                    $('.id_atasan').html(html);
                     
                }
            });
        });
    });
</script>
<!-- -->
<?= $this->endSection() ?>