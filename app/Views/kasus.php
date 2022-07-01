<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
<?php echo view('v_alert');?>
    <div class="page-header">
        <h3 class="page-title"> Data Kasus </h3>
        <button type="button" class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Input Kasus</button>
        
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kasus</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kasus</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Data Kasus</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Kasus</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($kasuss as $kasus) : ?>
                            <tr>
                                <td><?= $no; $no++ ?></td>
                                <td><?= $kasus['kasus'] ?></td>
                                <td><?= $kasus['deskripsi'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#edit<?=$kasus['id_kasus']?>" type="button" class="btn btn-warning btn-sm btn-icon-text">
                                        <i class="mdi mdi-pencil btn-icon-prepend"></i>  
                                    </button>
                                    <a type="button" class="btn btn-danger btn-sm btn-icon-text" data-href="<?= base_url('admin/kasus/'.$kasus['id_kasus'].'/delete') ?>" onclick="confirmToDelete(this)">
                                        <i class="mdi mdi-close btn-icon-prepend"></i>  
                                    </a>
                                    <a type="button" class="btn btn-success btn-sm  btn-icon-text" href="<?= base_url('admin/jaringan_kasus/'.$kasus['id_kasus']) ?>">
                                        <i class="mdi mdi-magnify btn-icon-prepend"></i> 
                                    </a>
                                    <div class="modal fade" id="edit<?=$kasus['id_kasus']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kasus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-sample" action="<?=base_url('admin/kasus/'.$kasus['id_kasus'].'/edit')?>" method="post" id="text-editor">
                                                <div class="mb-3">
                                                    <label for="kasus" class="col-form-label">Kasus :</label>
                                                    <input type="text" class="form-control" id="kasus" name="kasus" value="<?=$kasus['kasus']?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?=$kasus['deskripsi']?>">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="tanggal_dibuka" class="col-form-label">Tanggal Dibuka:</label>
                                                  <input type="date" class="form-control" id="tanggal_dibuka" name="tanggal_dibuka" value="<?=$kasus['tanggal_dibuka']?>">
                                                </div>
                                                <div class="mb-3">
                                                  <label for="tanggal_dibuka" class="col-form-label">Tanggal Ditutup:</label>
                                                  <input type="date" class="form-control" id="tanggal_ditutup" name="tanggal_ditutup" value="<?=$kasus['tanggal_ditutup']?>">
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="status" value="simpan" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h2">Anda yakin ingin menghapus?</h2>
        <p>Data akan hilang</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Kasus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-sample" action="<?=base_url('admin/kasus/create')?>" method="post" id="text-editor">
          <div class="mb-3">
            <label for="kasus" class="col-form-label">Nama Kasus:</label>
            <input type="text" class="form-control" id="kasus" name="kasus">
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="col-form-label">Deskripsi:</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
          </div>
          <div class="mb-3">
            <label for="tanggal_dibuka" class="col-form-label">Tanggal Dibuka:</label>
            <input type="date" class="form-control" id="tanggal_dibuka" name="tanggal_dibuka">
          </div>
          <div class="mb-3">
            <label for="tanggal_dibuka" class="col-form-label">Tanggal Ditutup:</label>
            <input type="date" class="form-control" id="tanggal_ditutup" name="tanggal_ditutup">
          </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="status" value="simpan" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>
<script>
      function myFunct(){
        <?php echo 'swal("Good job!", "You clicked the button!", "success")';
        ?>
        
      }
    </script>

<?= $this->endSection() ?>