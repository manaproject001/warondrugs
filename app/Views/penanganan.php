<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
<?php echo view('v_alert');?>

    <div class="page-header">
        <h3 class="page-title"> Penanganan </h3>
        <button type="button" class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Input Penanganan</button>
        
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penanganan</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Data Penanganan</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Penanganan</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($penanganan as $penanganan) : ?>
                            <tr>
                                <td><?= $no; $no++ ?></td>
                                <td><?= $penanganan['penanganan'] ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#edit<?=$penanganan['id_penanganan']?>" type="button" class="btn btn-warning btn-sm btn-icon-text">
                                        <i class="mdi mdi-pencil btn-icon-prepend"></i> Edit 
                                    </button>
                                    <a type="button" class="btn btn-danger btn-sm btn-icon-text" data-href="<?= base_url('admin/data/penanganan/'.$penanganan['id_penanganan'].'/delete') ?>" onclick="confirmToDelete(this)">
                                        <i class="mdi mdi-close btn-icon-prepend"></i> Hapus 
                                    </a>
                                    <div class="modal fade" id="edit<?=$penanganan['id_penanganan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Input Data penanganan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-sample" action="<?=base_url('admin/data/penanganan/'.$penanganan['id_penanganan'].'/edit')?>" method="post" id="text-editor">
                                                <div class="mb-3">
                                                    <label for="penanganan" class="col-form-label">Nama penanganan:</label>
                                                    <input type="text" class="form-control" id="penanganan" name="penanganan" value="<?=$penanganan['penanganan']?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Input Data penanganan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-sample" action="<?=base_url('admin/data/penanganan/create')?>" method="post" id="text-editor">
          <div class="mb-3">
            <label for="penanganan" class="col-form-label">Nama penanganan:</label>
            <input type="text" class="form-control" id="penanganan" name="penanganan">
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